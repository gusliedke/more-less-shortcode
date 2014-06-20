
(function() {
   tinymce.create('tinymce.plugins.moreless', {
      init : function(ed, url) {
         ed.addButton('moreless', {
            title : 'Show more less',
            image : url+'/moreless.png',
            onclick : function() {
               ed.execCommand('mceInsertContent', false, '[moreless] Content to hide here.. [/moreless]');
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "Show more less",
            author : 'Gustavo Liedke',
            authorurl : 'http://www.gustavoliedke.com',
            infourl : 'http://www.pedalo.co.uk',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('moreless', tinymce.plugins.moreless);
})();