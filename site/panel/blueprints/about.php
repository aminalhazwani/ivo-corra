<?php if(!defined('KIRBY')) exit ?>

# about blueprint

title: Page
pages: false
files: false
fields:
    title: 
        label: Titolo pagina
        type:  text
    bio: 
        label: Biografia
        type:  textarea
        size:  large
    address: 
        label: Via/piazza e numero civico
        type:  text
    city:
        label: CAP e città
        type: text
    province:
        label: Provincia
        type: text
    mail: 
        label: Indirizzo Email
        type:  text
    fiscal: 
        label: Codice Fiscale
        type:  text
    vat: 
        label: Partita Iva
        type:  text
