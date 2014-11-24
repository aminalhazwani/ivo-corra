<?php if(!defined('KIRBY')) exit ?>

# default blueprint

title: Page
pages: false
files: true
fields:
    title: 
        label: Titolo pubblicazione
        type:  text
    date: 
        label: Anno di pubblicazione
        type:  date
        format: dd.mm.yy
    editor: 
        label: Editore
        type:  text
    text: 
        label: Descrizione
        type:  textarea
        size: large