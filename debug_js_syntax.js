const fs = require('fs');

// Lire le fichier app-layout.php
const content = fs.readFileSync('views/layouts/app-layout.php', 'utf8');

// Extraire le JavaScript entre les balises <script>
const scriptRegex = /<script[^>]*>([\s\S]*?)<\/script>/gi;
let match;
let jsCode = '';
let scriptCount = 0;

while ((match = scriptRegex.exec(content)) !== null) {
    scriptCount++;
    console.log(`\n=== SCRIPT ${scriptCount} ===`);
    
    try {
        new Function(match[1]);
        console.log('✅ Syntaxe valide');
    } catch (error) {
        console.log('❌ Erreur de syntaxe:', error.message);
        
        // Afficher les lignes autour de l'erreur
        const lines = match[1].split('\n');
        const errorLine = error.lineNumber || 0;
        const start = Math.max(0, errorLine - 3);
        const end = Math.min(lines.length, errorLine + 3);
        
        console.log('Contexte:');
        for (let i = start; i < end; i++) {
            const marker = i === errorLine - 1 ? '>>> ' : '    ';
            console.log(`${marker}${i + 1}: ${lines[i]}`);
        }
    }
}
