<?php if(!defined('KIRBY')) exit ?>

# work blueprint

title: Page
pages: false
files: true
fields:
    title: 
        label: Titolo progetto
        type:  text
    home: 
        label: Lavoro in homepage?
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
files:
  sortable: true
  fields: 
    caption: 
      label: Didascalia della foto
      type: text
    inserisci:
      type: radio
      label: Inserisci la foto nello slideshow in homepage?
      options:
          ja:  Inserisci
          nein: Non inserisci
      default: ja