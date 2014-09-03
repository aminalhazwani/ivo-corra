<?php if(!defined('KIRBY')) exit ?>

# works blueprint

title: Page
pages: false
files: true
fields:
    title: 
        label: Titolo progetto
        type:  text
    text: 
        label: Testo del progetto
        type:  textarea
        size:  large
        buttons: true
    tags: 
        label: Categoria
        type: tags
filefields: 
    caption: 
        label: Titolo foto
        type:  text