const puppeteer = require('puppeteer');

var panierJson = "";
const bigPan = process.argv.slice(2);
if (bigPan.length > 0) {
  // Récupérer la chaîne JSON du premier argument
  const jsonString = bigPan[0];
  panierJson = JSON.parse(jsonString);

} else {
  console.error('Aucun argument n\'a été passé.');
}


var panier = [];
console.log(panierJson);
panierJson.forEach((plat) => {
  var rowPanier = "";
  rowPanier += plat.id + ',';
  var i = 1;
  i = 1;
  while (typeof plat[i] !== 'undefined') {
    rowPanier += plat[i] + ',';
    i += 1;
  }
  rowPanier = rowPanier.slice(0, -1);
  panier.push(rowPanier);
});
panier.splice(0, 1);

(async () => {
  const browser = await puppeteer.launch({ headless: false });
  const page = await browser.newPage();
  await page.setViewport({ width: 1920, height: 1080 });

  await page.goto("https://deliver.biz/carte/carte?key=2f36ed46f90d09bda1d85e2c47217212d8148038&c=CLICKCONTA6NH1&ui=light&lang=fr&noiframe=true", { timeout: 0 });
  await new Promise(resolve => setTimeout(resolve, 500)); await new Promise(resolve => setTimeout(resolve, 1000)); // Attendre un certain temps avant d'exécuter la prochaine instruction

  await page.goto("https://deliver.biz/account/login", { timeout: 0 });
  await new Promise(resolve => setTimeout(resolve, 500));

  const mailSelector = 'input[type="email"]';
  await page.type(mailSelector, 'vitrice91@gmail.com');
  const mdpSelector = 'input[type="password"]';
  await new Promise(resolve => setTimeout(resolve, 500));
  await page.type(mdpSelector, '@9G@R6Ej!MD3Zbk');
  await new Promise(resolve => setTimeout(resolve, 500));
  const logButton = 'button[type="submit"]';
  await page.click(logButton);
  await new Promise(resolve => setTimeout(resolve, 1000));

  for (const produit of panier) {
    let infoProduit = produit.split(",");

    let idProduit = infoProduit[0];
    console.log(infoProduit);

    await page.goto("https://deliver.biz/carte/options/" + idProduit, { timeout: 0 });
    await new Promise(resolve => setTimeout(resolve, 200));
    for (var step = 1; step < infoProduit.length; step++) {
      var test = step;
      const currentLib = await page.evaluate((test) => {
        const radioInput = document.querySelector("form:nth-of-type(" + test + ") .col-md-12 .headline-gamma");
        return radioInput ? radioInput.innerText : null;
      }, test);
      console.log(currentLib);
      let nbOption=infoProduit[step];
      nbOption++;
      if (step + 1 == infoProduit.length || currentLib == "NEM BOBUN" || currentLib == "CACAHUÈTE BOBUN & PAD THAÏ" || currentLib =="BASE POKE BOWL" || currentLib =="CUISSON BOEUF" || currentLib=="OPTIONS SOUPES" || currentLib=="VIANDE MEZZE" || currentLib=="BASE POKE BOWL") {
        if ((currentLib=="CUISSON BOEUF"||currentLib=="OPTIONS SOUPES" || currentLib=="VIANDE MEZZE") && nbOption>=4){
          nbOption++;
          if(nbOption>=6){
            nbOption++;
            if(nbOption==8){
              nbOption++;
            }
          }
        }
        nbOption++;
      }

      console.log(currentLib);
      // console.log("form:nth-of-type("+step+") .col-md-6:nth-of-type("+nbOption+")");
      if (currentLib == "CONSIGNE DESSERT ÉCOLOGIQUE") {

        await page.click('.radio-input');
        await new Promise(resolve => setTimeout(resolve, 200));
      } else {
        await page.click("form:nth-of-type(" + step + ") .col-md-6:nth-of-type(" + nbOption + ")");
        await new Promise(resolve => setTimeout(resolve, 200));
      }

    }
    const addToCart = '.addToCart';
    await page.click(addToCart)
    await new Promise(resolve => setTimeout(resolve, 1000));



  }
})();

