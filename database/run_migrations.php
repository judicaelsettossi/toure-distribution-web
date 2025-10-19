<?php

require_once __DIR__ . '/../configs/database.php';

function run_sql_file(PDO $pdo, string $filePath): void {
    if (!file_exists($filePath)) {
        throw new RuntimeException("SQL file not found: {$filePath}");
    }
    $sql = file_get_contents($filePath);
    if ($sql === false) {
        throw new RuntimeException("Failed to read SQL file: {$filePath}");
    }

    $statements = array_filter(array_map('trim', preg_split('/;\s*\n|;\r?\n|;\s*$/m', $sql)));
    $pdo->beginTransaction();
    try {
        foreach ($statements as $stmt) {
            if ($stmt === '' || strpos($stmt, '--') === 0) {
                continue;
            }
            $pdo->exec($stmt);
        }
        $pdo->commit();
    } catch (Throwable $e) {
        $pdo->rollBack();
        throw $e;
    }
}

try {
    $pdo = get_pdo();

    // Ensure migrations table exists
    $pdo->exec("CREATE TABLE IF NOT EXISTS migrations (id INT AUTO_INCREMENT PRIMARY KEY, filename VARCHAR(255) NOT NULL UNIQUE, applied_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP)");

    $migrationsDir = __DIR__ . '/migrations';
    if (!is_dir($migrationsDir)) {
        throw new RuntimeException('Migrations directory not found: ' . $migrationsDir);
    }

    $files = glob($migrationsDir . '/*.sql');
    sort($files);

    $stmt = $pdo->query('SELECT filename FROM migrations');
    $applied = $stmt ? $stmt->fetchAll(PDO::FETCH_COLUMN) : [];
    $appliedSet = array_flip($applied);

    foreach ($files as $file) {
        $basename = basename($file);
        if (isset($appliedSet[$basename])) {
            echo "Skipping already applied migration: {$basename}\n";
            continue;
        }
        echo "Applying migration: {$basename}\n";
        run_sql_file($pdo, $file);
        $ins = $pdo->prepare('INSERT INTO migrations (filename) VALUES (?)');
        $ins->execute([$basename]);
        echo "Applied: {$basename}\n";
    }

    echo "All migrations applied.\n";
} catch (Throwable $e) {
    fwrite(STDERR, 'Migration error: ' . $e->getMessage() . "\n");
    exit(1);
}
