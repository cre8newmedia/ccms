
function plugin_return_url(){this.name='return_url';this.isDefault=true;this.title='return url';this.mode=2;this.writable=2;this.category='returning';this.extensions='all';this.doFunction=function(files){if(!window.opener){kfm.alert(_("There is no KFM opener to return to",0,0,0));return;}
x_kfm_getFileUrls(selectedFiles,function(urls){var caption='',url='';if(files.length==1&&File_getInstance(files[0]).width){url=urls[0].replace(/([^:]\/)\//g,'$1');caption=File_getInstance(files[0]).caption;}
else{if(files.length==1)url=urls[0];else url='"'+urls.join('","')+'"';}
window.SetUrl(url,0,0,caption);setTimeout('window.close()',1);});}
this.nocontextmenu=false;}
kfm_addHook(new plugin_return_url());