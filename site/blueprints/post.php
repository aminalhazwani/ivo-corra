<?php if(!defined('KIRBY')) exit ?>

# post blueprint

title: Post
pages: false
files: true
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