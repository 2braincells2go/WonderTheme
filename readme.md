# JANUARY 2016 -- New Life?
The main focus will be for use in classroom/local intranet development but should work on most current webservers.

Why not fork it and help make better! Looking for those that wish to implement other WYSISWYG editors such as Ckeditor (w/filemanger) or similar.

#What is WonderTheme?

Wondertheme is a special theme for [WonderCMS (v0.6 BETA)](http://www.wondercms.com) based on [Bootstrap 3](http://getbootstrap.com). It includes additional features, such as an AJAX contact form.

#Demo
Live demo is available at [http://wondertheme.ml](wondertheme.ml).

#Installation

To install this theme, just unzip `wondertron.zip` into your "themes" folder in WonderCMS. (It should automatically expand into a folder called 'wondertron').

You can also download the `public_html` folder to the target directory of your site, which includes a WonderCMS (v0.6 BETA) installation. You can place all the files from the public_html folder into your root or subdirectory. Normally you will not have to change anything, just login and start playing. We are in NO WAY associated with WonderCMS and all issues with the CMS should be taken up with them.

!!!IMPORTANT:!!! If you are installing `wondertron.zip` into your own WonderCMS installation (not using the `public_html` folder included here), you MUST make one modification to your index.php file. Around line 22-24, add:

    include ('themes/wondertron/default-content.php');
    
The above line should be entered right under:

    # Load default content for theme, if any


