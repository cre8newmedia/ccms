
function kfm_plugin_captions(){this.name='captions';this.title="Change Caption";this.category='edit';this.mode=0;this.writable=2;this.extensions=kfm_imageExtensions;this.doFunction=function(files){kfm_changeCaption(files[0]);};}
kfm_addHook(new kfm_plugin_captions());function kfm_changeCaption(id){kfm_prompt(_("Change Caption"),File_getInstance(id).caption,function(newCaption){x_kfm_changeCaption(id,newCaption,function(res){File_getInstance(id).caption=newCaption;});});}