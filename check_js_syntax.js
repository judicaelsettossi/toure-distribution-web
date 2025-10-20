const fs = require('fs');

// Lire le fichier app-layout.php
const content = fs.readFileSync('views/layouts/app-layout.php', 'utf8');

// Extraire le JavaScript entre les balises <script>
const scriptRegex = /<script[^>]*>([\s\S]*?)<\/script>/gi;
let match;
let jsCode = '';

while ((match = scriptRegex.exec(content)) !== null) {
    jsCode += match[1] + '\n';
}

// Vérifier la syntaxe JavaScript
try {
    new Function(jsCode);
    console.log('✅ Syntaxe JavaScript valide');
} catch (error) {
    console.log('❌ Erreur de syntaxe JavaScript:', error.message);
    console.log('Ligne approximative:', error.lineNumber || 'inconnue');
}
