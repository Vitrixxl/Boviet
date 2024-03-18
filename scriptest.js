const mysql = require('mysql');
const puppeteer = require('puppeteer');

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'boviet'
});

connection.connect((err) => {
  if (err) {
    console.error('Erreur de connexion à la base de données :', err);
    return;
  }

  const sql = 'SELECT pan_content FROM panier';

  connection.query(sql, async (err, result) => { // Rendre cette fonction asynchrone
    if (err) {
      console.error('Erreur lors de l\'exécution de la requête SELECT :', err);
      return;
    }

    // Initialisation de Puppeteer à l'extérieur de la boucle forEach
    const browser = await puppeteer.launch({
      headless: false
    });
    const page = await browser.newPage();
    await page.setViewport({ width: 1920, height: 1080 });

    result.forEach(async (row) => { // Rendre cette fonction asynchrone
      const panierJson = JSON.parse(row.pan_content);
      var panier = [];

      panierJson.forEach(async (plat) => { // Rendre cette fonction asynchrone
        // Actions Puppeteer à l'intérieur de la boucle forEach
        await page.goto("https://deliver.biz/carte/carte?key=2f36ed46f90d09bda1d85e2c47217212d8148038&c=CLICKCONTA6NH1&ui=light&lang=fr&noiframe=true", { timeout: 0 });
        await page.evaluate(async () => {
          await new Promise(function (resolve) {
            setTimeout(resolve, 1000)
          });
        });
        await page.goto("https://deliver.biz/account/login", { timeout: 0 });
        await page.evaluate(async () => {
          await new Promise(function (resolve) {
            setTimeout(resolve, 500)
          });
        });
        const mailSelector = 'input[type="email"]';
        await page.type(mailSelector, 'vitrice91@gmail.com');
        const mdpSelector = 'input[type="password"]';
        await page.evaluate(async () => {
          await new Promise(function (resolve) {
            setTimeout(resolve, 500)
          });
        });
        await page.type(mdpSelector, '@9G@R6Ej!MD3Zbk');
        await page.evaluate(async () => {
          await new Promise(function (resolve) {
            setTimeout(resolve, 500)
          });
        });
        const logButton = 'button[type="submit"]';
        await page.click(logButton);
        await page.evaluate(async () => {
          await new Promise(function (resolve) {
            setTimeout(resolve, 5000)
          });
        });
      });
    });

    // Fermer le navigateur à la fin du traitement
    await browser.close();
  });
});