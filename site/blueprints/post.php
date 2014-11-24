<?php if(!defined('KIRBY')) exit ?>

# post blueprint

title: Page
pages: false
files: false
fields:
    title: 
        label: Titolo del post
        type:  text
    date: 
        label: Data del post
        type:  date
        format: dd.mm.yy
    text: 
        label: Testo del post
        type:  textarea
        size:  large
        buttons: true