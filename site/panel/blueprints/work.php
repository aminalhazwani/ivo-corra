<?php if(!defined('KIRBY')) exit ?>

# works blueprint

title: Page
pages: true
files: true
fields:
    title: 
        label: Titolo progetto
        type:  text
    tags: 
        label: Categoria
        type: tags
    home: 
        label: Lavoro in homepage
        type: radio
        options:
            ja:  Inserisci
            nein: Non inserisci
        default: ja