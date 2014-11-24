<?php if(!defined('KIRBY')) exit ?>

# default blueprint

title: Page
pages: false
files: true
fields:
    title: 
        label: Titolo della mostra
        type:  text
    date: 
        label: Data di inizio
        type:  date
        format: dd.mm.yy
    enddate: 
        label: Data di fine
        type:  date
        format: dd.mm.yy
    place: 
        label: Luogo della mostra
        type:  text
    link: 
        label: Link alla pagina della mostra
        type:  text
    text: 
        label: Descrizione
        type:  textarea
        size: large