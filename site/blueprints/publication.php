<?php if(!defined('KIRBY')) exit ?>

# default blueprint

title: Page
pages: false
files: true
fields:
    title: 
        label: Titolo pubblicazione
        type:  text
        required: true
    date: 
        label: Anno di pubblicazione
        type:  date
        format: dd.mm.yy
        required: true
    editor: 
        label: Editore
        type:  text
        required: true