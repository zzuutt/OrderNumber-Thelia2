#OrderNumber + InvoiceNumber v1.30
######Compatible Version 2.0.3 - Mise à jour le 19/09/2014######
##Summary
Personnalisation du numéro du bon de commande et du numéro de facture

Dans les boucle {loop type="order"} pensez à utiliser la variable {$INVOICE_REF}
pour utiliser votre numéro de facture personnalisé

{$REF} correspond à votre numéro de commande

Français (fr_FR)

1. Installation

2. Configuration

3. Commandes disponibles

Customizing your order / invoice number 

English (en_US)

1. How to install

2. Configure the module

##fr_FR

### Installation
Ce module doit être dans votre dossier ```modules/``` (thelia/local/modules/).

Puis, allez dans votre Back-office Thelia pour activer ce module.

### Configuration
Pour pouvoir utiliser ce module, vous devez d'abord entrer le mask de votre numéro de commande et de facture dans
la page de configuration du module OrderNumber.
Le numero de facture est generé quand la commande passe à payée.

###Commandes disponibles

{id} : affiche la valeur de l'id. Il est incrementé de 1 à chaque commande passée.

{Date(mask)} : Vous pouvez mettre tous les mask disponibles de la fonction php.

{PadStr(string1,int,string2,LEFT|RIGHT|BOTH)} : permet de completer la chaine string1 jusqu'à une taille int avec la chaine string2, à gauche LEFT, à doite RIGHT ou des deux cotés BOTH. Identique à la fonction php str_pad.
##en_US

### How to install
This module must be into your ```modules/``` directory (thelia/local/modules/).

Next, go to your Thelia admin panel for module activation.

### Configure the module

Before using this module you first need to configure the mask of your order number and invoice number in the module configuration page OrderNumber.
The invoice number is generate when the order status change in to paid.


