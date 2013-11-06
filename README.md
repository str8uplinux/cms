Simple CMS
==========

Simple CMS uses PHP's 'RecursiveDirectoryIterator' Class. Each DIRECTORY starts a new CMS "section", and each FILE within the directory is placed under its "section" as a downloadable link. 

# Setup #
1.	If you plan on using a directory that is outside the root of the application, you must create a virtual directory (IIS) or alias (Apache)
2.	The name of the virtual directory/alias must be "files" and this must point to your intranet (CMS) directory
3.	In this example, the virtual directory "files" points to "C:/intranet"
4.	Set Variables
	* <code>$CMS_DIR = "C:/intranet/";</code>
	* <code>$APP_DIR = "http://localhost/cms/files/"</code>
