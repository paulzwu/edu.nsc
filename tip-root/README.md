canvas-scripts
==============

Sample PHP scripts for working with Canvas LMS via API and common cartridge files.
Everything in this repo is licensed under GNU Public License unless otherwise
stated.  Created by David Lippman for Lumen Learning.

API
---
This folder contains some scripts for dealing with Canvas's API.

_canvaslib.php_  
A simple library for working with a small subset of the API. Simplifies getting
lists, getting item data, and updating items.

_searchreplace.php_  
A sample script using canvaslib.php for doing search-and-replace across
all wiki pages in a course.

_canvassearch.html, canvassearch.php, canvassearch.js_  
A sample web interface for doing search/replace/append across a variety of
item types, without having to adjust the code everytime.  There is a copy of
this [on my website](http://www.imathas.com/canvas/canvassearch.html), but you
really should only trust a version you host yourself with your Canvas token.

_addoutcomes.php_
A script for adding outcome to an outcome group, loaded from a CSV file.

_liststudents.php_
Lists the students, with email addresses, for a course.

QTI
---
This folder contains some scripts for generating QTI files.  These are not
elegant scripts.

_wordtoquiz*.html_  
The three wordtoquiz*.html files are designed to take multiple-choice quizzes 
pasted into a TinyMCE editor, and export a QTI file.  They were written to use
MyOpenMath's existing TinyMCE install, so would need to be adjusted for local
use.  They can be use d live at myopenmath.com/util/wordtoquiz*.html.

_xmltocanvas.php_  
Designed to take a directory of XML files describing quizzes and convert them
into QTI files.  The interesting part in these is adding handling for
answer-specific feedback.  

Common Cartridge
----------------
This folder contains scripts for generating or modifying common cartridge files,
including using Canvas's extensions to create modules.

_canvasbase.zip, canvasbase2.zip_  
Empty cartridges with some of the necessary junk that Canvas needs to process
it correctly.  These gets used in some of the scripts.  canvasbase2.zip has 
special markers added for replacement.  canvasbase.zip has no imsmanifest or
module_meta.

_simpleimport.php_
An example of how to import a collection of HTML content as Canvas wiki pages.

_fwktocanvas3.php_  
Designed to take a file archive from 2012books.lardbucket.org and convert the
HTML files into Canvas wiki pages.  This particular version saves the images
separately for uploaded to another site.

_fwktocanvas2.php_  
A version of the above, but one that embeds the images in the cartridge.

_openstaxtocanvas.php_  
A version of the above, designed to operate on the uncompressed content folder
of the EPUB version of a text from OpenStax / Connexions.

_searchreplace.php_  
A script to do search-and-replace on wiki pages in a cartridge file.



