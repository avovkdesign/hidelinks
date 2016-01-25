(function() {
    tinymce.PluginManager.add('hidelinks_button', function( editor, url ) {
        
        var myButton = null;

        editor.addButton( 'hidelinks_button', {
            title: 'Установите курсор на ссылку в редакторе и нажмите кнопку, чтобы закрыть от индексации гиперссылку',
            icon: 'mce-hidelinks',
            image: url + '/hidelinks.gif',
            disabledStateSelector: ':not(a)',

            onPostRender: function() { myButton = this; },  

            onclick: function() {
                var node = editor.selection.getNode(),                
                    startTagText = document.createTextNode("[link]");   
                    endTagText = document.createTextNode("[/link]"),
                    prev = node.previousSibling,
                    next = node.nextSibling,
                    prev_text = prev.textContent,
                    next_text = next.textContent,
                    state = true;

                if ( -1 != next_text.search('\[\/link\]') && -1 != prev_text.search('\[link\]') ) {

                    startTagText = document.createTextNode( prev_text.replace( '\[link\]', '') );   
                    endTagText = document.createTextNode( next_text.replace( '\[\/link\]', '') ); 

                    node.parentNode.removeChild( prev );
                    node.parentNode.removeChild( next );

                    state = false;

                } else {
                    // this.active(false);
                }

                node.parentNode.insertBefore( startTagText, node ); 
                node.parentNode.insertBefore( endTagText, node.nextSibling );
                this.active( state );
            }
        });
        
        editor.on('NodeChange', function(event) {
            if(myButton) {
                myButton.disabled(!(event.element.nodeName == 'A'));
                
                var node = editor.selection.getNode();
                if ( node ) {

                    var prev = node.previousSibling,
                        next = node.nextSibling,
                        state = false;

                    if(node && prev && next) {
                        if ( -1 != next.textContent.search('\[\/link\]') && -1 != prev.textContent.search('\[link\]') ) {
                            state = true;
                        }
                    }

                }
                myButton.active( state );

            }
        });

            
    });
})();