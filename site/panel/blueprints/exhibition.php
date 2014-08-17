<?php if(!defined('KIRBY')) exit ?>

# default blueprint

title: Page
pages: false
files: false
fields:
    title: 
        label: Titolo della mostra
        type:  text
        required: true
    startdate: 
        label: Data di inizio
        type:  date
        format: dd.mm.yy
        required: true
    enddate: 
        label: Data di fine
        type:  date
        format: dd.mm.yy
    place: 
        label: Luogo della mostra
        type:  text
        required: true