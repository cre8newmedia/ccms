/*
This plugin.js script is written for use with PHPMailer-ML when
using the CKEditor. It is designed to add a menu option for
variable substitution within an email message body. To use it
you will require the file "inc.campaigns.php" for PHPMailer-ML
version 1.8.1a. 
Author: Andy Prevost
License: GPL
*/
CKEDITOR.plugins.add( 'varinsert',
{   
   requires : ['richcombo'], //, 'styles' ],
   init : function( editor )
   {
      var config = editor.config,
         lang = editor.lang.format;

      // Gets the list of tags from the settings.
      var tags = []; //new Array();
      //this.add('value', 'drop_text', 'drop_label');
    tags[0]=["{applicationname}", "Application Name", "Application Name"];
    tags[1]=["{email}",           "Email Address", "Email Address"];
    tags[2]=["{ip}",              "IP Address", "IP Address"];
    tags[3]=["{firstname}",       "First Name", "First Name"];
    tags[4]=["{lastname}",        "Last Name", "Last Name"];
    tags[5]=["{mailinglist}",     "Mailing List", "Mailing List"];
    tags[6]=["{msgid}",           "Message ID", "Message ID"];
    tags[7]=["{onlineviewurl}",   "View Online Link", "View Online Link"];
    tags[8]=["{reg_date}",        "Registration Date", "Registration Date"];
    tags[9]=["{remote_host}",     "Remote Host", "Remote Host"];
    tags[10]=["{unsubscribe}",     "Unsubscribe Link", "Unsubscribe Link"];
      
      // Create style objects for all defined styles.

      editor.ui.addRichCombo( 'varinsert',
         {
            label : "Insert",
            title :"Insert",
            voiceLabel : "Insert",
            className : 'cke_format',
            multiSelect : false,

            panel :
            {
               css : [ config.contentsCss, CKEDITOR.getUrl( editor.skinPath + 'editor.css' ) ],
               voiceLabel : lang.panelVoiceLabel
            },

            init : function()
            {
               this.startGroup( "Insert" );
               //this.add('value', 'drop_text', 'drop_label');
               for (var this_tag in tags){
                  this.add(tags[this_tag][0], tags[this_tag][1], tags[this_tag][2]);
               }
            },

            onClick : function( value )
            {         
               editor.focus();
               editor.fire( 'saveSnapshot' );
               editor.insertHtml(value);
               editor.fire( 'saveSnapshot' );
            }
         });
   }
});