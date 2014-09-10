<?php if(!defined('KIRBY')) exit ?>

# works blueprint

title: Page
pages: false
files: true
fields:
    title: 
        label: Titolo progetto
        type:  text
    home: 
        label: Lavoro in homepage
        type: radio
        options:
            ja:  Inserisci
            nein: Non inserisci
        default: ja
    tags: 
        label: Categoria
        type: tags
    text: 
        label: Testo del progetto
        type:  textarea
        size:  large
filefields: 
    caption: 
        label: Didascalia foto
        type: text
    inserisci:
        label: Foto in homepage? 
        type: text