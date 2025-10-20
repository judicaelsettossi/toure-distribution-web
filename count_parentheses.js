const fs = require('fs');

// Lire le fichier app-layout.php
const content = fs.readFileSync('views/layouts/app-layout.php', 'utf8');

// Extraire le JavaScript entre les balises <script>
const scriptRegex = /<script[^>]*>([\s\S]*?)<\/script>/gi;
let match;
let scriptCount = 0;

while ((match = scriptRegex.exec(content)) !== null) {
    scriptCount++;
    if (scriptCount === 13) { // Le script problématique
        console.log('=== SCRIPT 13 ===');
        const jsCode = match[1];
        
        // Compter les parenthèses
        let openParens = 0;
        let closeParens = 0;
        let openBraces = 0;
        let closeBraces = 0;
        
        for (let i = 0; i < jsCode.length; i++) {
            const char = jsCode[i];
            if (char === '(') openParens++;
            if (char === ')') closeParens++;
            if (char === '{') openBraces++;
            if (char === '}') closeBraces++;
        }
        
        console.log(`Parenthèses: (${openParens} ouvertes, ${closeParens} fermées)`);
        console.log(`Accolades: {${openBraces} ouvertes, ${closeBraces} fermées)`);
        
        if (openParens !== closeParens) {
            console.log('❌ Parenthèses déséquilibrées');
        }
        if (openBraces !== closeBraces) {
            console.log('❌ Accolades déséquilibrées');
        }
        
        // Afficher les dernières lignes
        const lines = jsCode.split('\n');
        console.log('\nDernières lignes:');
        for (let i = Math.max(0, lines.length - 10); i < lines.length; i++) {
            console.log(`${i + 1}: ${lines[i]}`);
        }
    }
}
