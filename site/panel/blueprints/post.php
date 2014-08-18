<?php if(!defined('KIRBY')) exit ?>

# post blueprint

title: Page
pages: false
files: false
fields:
    title: 
        label: Titolo del post
        type:  text
        required: true
    date: 
        label: Data del post
        type:  date
        format: dd.mm.yy
        required: true
    text: 
        label: Testo del post
        type:  textarea
        size:  large
        buttons: true