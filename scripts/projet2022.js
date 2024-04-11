// VOTRE NOM A COMPLETER ICI

// ===  variables globales === 

// constantes
const MAX_QTY = 9;

//  tableau des produits à acheter
const cart = []
// total actuel des produits dans le panier
let total = 0;


// === initialisation au chargement de la page ===

/**
* Création du Magasin, mise à jour du total initial
* Mise en place du gestionnaire d'événements sur filter
*/
const init = function () {
	createShop();
	updateTotal();
	const filter = document.getElementById("filter");
	filter.addEventListener("keyup", filterDisplaidProducts);
}
window.addEventListener("load", init);



// ==================== fonctions utiles ======================= 

/**
* Crée et ajoute tous les éléments div.produit à l'élément div#boutique
* selon les objets présents dans la variable 'catalog'
*/
const createShop = function () {
	const shop = document.getElementById("boutique");
	for(let i = 0; i < catalog.length; i++) {
		shop.appendChild(createProduct(catalog[i], i));
	}
}

/**
* Crée un élément div.produit qui posséde un id de la forme "i-produit" où l'indice i 
* est correpond au paramètre index
* @param {Object} product - le produit pour lequel l'élément est créé
* @param {number} index - l'indice (nombre entier) du produit dans le catalogue (utilisé pour l'id)
* @return {Element} une div.produit
*/
const createProduct = function (product, index) {
	// créer la div correpondant au produit
	const divProd = document.createElement("div");
	divProd.className = "produit";
	// fixe la valeur de l'id pour cette div
	divProd.id = index + "-product";
	// crée l'élément h4 dans cette div
	divProd.appendChild(createBlock("h4", product.name));
	
	// Ajoute une figure à la div.produit... 
	// /!\ non fonctionnel tant que le code de createFigureBlock n'a pas été modifié /!\ 
	divProd.appendChild(createFigureBlock(product));

	// crée la div.description et l'ajoute à la div.produit
	divProd.appendChild(createBlock("div", product.description, "description"));
	// crée la div.prix et l'ajoute à la div.produit
	divProd.appendChild(createBlock("div", product.price, "prix"));
	// crée la div.controle et l'ajoute à la div.produit
	divProd.appendChild(createOrderControlBlock(index));
	return divProd;
}


/** Crée un nouvel élément avec son contenu et éventuellement une classe
 * @param {string} tag - le type de l'élément créé (example : "p")
 * @param {string} content - le contenu html de l'élément a créé  (example : "bla bla")
 * @param {string} [cssClass] - (optionnel) la valeur de l'attribut 'classe' de l'élément créé
 * @return {Element} élément créé
 */
const createBlock = function (tag, content, cssClass) {
	const element = document.createElement(tag);
	if (cssClass != undefined) {
		element.className =  cssClass;
	}
	element.innerHTML = content;
	return element;
}

/** Met à jour le montant total du panier en utilisant la variable globale total
 */
const updateTotal = function () {
	const montant = document.getElementById("montant");
	montant.textContent = total;
}

// ======================= fonctions à compléter =======================


/**
* Crée un élément div.controle pour un objet produit
* @param {number} index - indice du produit considéré
* @return {Element}
* TODO : AJOUTER les gestionnaires d'événements
*/
const createOrderControlBlock = function (index) {
	const control = document.createElement("div");
	control.className = "controle";

	// crée l'élément input permettant de saisir la quantité
	const input = document.createElement("input");
	input.id = index + "-qte";
	input.type = "number";
	input.step = "1";
	input.value = "0";
	input.min = "0";
	input.max = MAX_QTY.toString();

	// TODO :  Q5 mettre en place le gestionnaire d'événément pour input permettant de contrôler les valeurs saisies
	input.addEventListener('change',verifQuantity);
	control.appendChild(input);

	// Crée le bouton de commande
	const button = document.createElement("button");
	button.className = 'commander';
	button.id = index + "-order";
	control.appendChild(button);

	return control;
}


/** 
* Crée un élément figure correspondant à un produit
* @param {Object} product -  le produit pour lequel la figure est créée
* @return {Element}
*/
const createFigureBlock = function (product) {
	const element = document.createElement("figure");
	const imageElement = document.createElement("img");
	imageElement.src = product.image;
	imageElement.alt = product.name;
	element.appendChild(imageElement);
	return element;
}


/** 
* @todo Q8
*/

const orderProduct = function () {
	console.log("click");
	const idx = parseInt(this.id);
	const qty = parseInt(document.getElementById(idx + "-qte").value);
	if (qty > 0) {
		addProductToCart(idx, qty); // ajoute un produit au panier
		//TODO gérer la remise à zéro de la quantité après la commande 
		document.getElementById(idx + "-qte").value = 0;
		// et tous les comportements du bouton représentant le chariot 
		document.getElementById(idx + "-order").disabled = true;
		document.getElementById(idx + "-order").style.opacity = "0.25";

	}
}


// ======================= fonctions à coder =======================

/**
* @todo Q6- Q7
*/
const verifQuantity = function (event) {
	let x = document.getElementsByTagName('input');
	if (event.currentTarget.value < 0 || event.currentTarget.value > MAX_QTY){
		event.currentTarget.value = 0;
		console.log(event.currentTarget.id.charAt(0));
	}else{
		if (event.currentTarget.value != 0 ){
			document.getElementById(event.currentTarget.id.charAt(0)+"-order").style.opacity = "1";
			document.getElementById(event.currentTarget.id.charAt(0)+"-order").disabled =false;
			document.getElementById(event.currentTarget.id.charAt(0)+"-order").addEventListener('click', orderProduct);

		}else{
			document.getElementById(event.currentTarget.id.charAt(0)+"-order").style.opacity = "0.25";
		}
	}	
}


/**
* Crée un élément div.retirer pour un objet produit
* @param {number} index - indice du produit considéré
* @return {Element}
* TODO : AJOUTER les gestionnaires d'événements
*/
const createRemoveControlBlock = function (index) {
	const control = document.createElement("div");
	control.className = "controle";
	const button = document.createElement("button");
	button.className = 'retirer';
	button.id = index + "-remove";
	control.appendChild(button);
	return control;
}

const  checkParent = function(parent, child) {
	if (parent.contains(child))
		return true;
	return false;
}



/**
* @todo Q9
* @param {number} index
* @param {number} qty
*/
const addProductToCart = function (index, qty) {
	//TODO
	const child = document.getElementById(index+"-achat");
	if (child !== null && child !== undefined) {
		total-= parseInt(child.querySelector('.quantite').innerText)*parseInt(document.getElementById(index+"-achat").querySelector('.prix').innerText);
		let newQty = parseInt(child.querySelector('.quantite').innerText)+qty;
		document.getElementById(index+"-achat").querySelector('.quantite').innerText = newQty;
		total+= parseInt(child.querySelector('.quantite').innerText)*parseInt(document.getElementById(index+"-achat").querySelector('.prix').innerText);
		updateTotal();
	}else{
		const product = catalog[index];
		total+= qty*product.price;
		// créer la div correpondant au achat
		const divAchat = document.createElement("div");
		divAchat.className = "achat";
		// fixe la valeur de l'id pour cette div
		divAchat.id = index + "-achat";
		// Ajoute une figure à la div.achat... 
		divAchat.appendChild(createFigureBlock(product));
		// crée l'élément h4 dans cette div
		divAchat.appendChild(createBlock("h4", product.name));
		// crée la div.quantite et l'ajoute à la div.achat
		divAchat.appendChild(createBlock("div", qty, "quantite"));
		// crée la div.prix et l'ajoute à la div.achat
		divAchat.appendChild(createBlock("div", product.price, "prix"));
		// crée la div.controle et l'ajoute à la div.produit
		divAchat.appendChild(createRemoveControlBlock(index));
		const panier = document.querySelector(".achats");
		panier.appendChild(divAchat);
		document.getElementById(index+ "-remove").disabled = false;
		updateTotal();
	}

	document.getElementById(index+"-remove").addEventListener('click',function(e) {
		total-= parseInt(document.getElementById(index+"-achat").querySelector('.quantite').innerText)*parseInt(document.getElementById(index+"-achat").querySelector('.prix').innerText);
		updateTotal();
		e.currentTarget.parentNode.parentNode.parentNode.removeChild(e.currentTarget.parentNode.parentNode);
	})
}

const supprimerBoutique = function(){
	const item = document.querySelector('#boutique')
	while (item.firstChild) {
  		item.removeChild(item.firstChild)
	}
}


/**
* @todo Q10
*/
const filterDisplaidProducts = function () {
	let filters =  catalog.filter(function(hero) {
		return hero.name.toLowerCase().indexOf(document.getElementById("filter").value.toLowerCase())!=-1;
	});
	supprimerBoutique();
	const shop = document.getElementById("boutique");
	for(let i = 0; i < filters.length; i++) {
		shop.appendChild(createProduct(filters[i], i));
	}
}

