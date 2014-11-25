<?php if(!defined('KIRBY')) exit ?>

# journal blueprint

title: Page
pages: 
    template: post
files: false
fields:
    title: 
        label: Titolo pagina
        type:  text
    numpost:
    	label: Numero di post visibili aperti
	    type: select
	    default: 3
	    options:
	      1: 1
	      2: 2
	      3: 3
	      4: 4
	      5: 5