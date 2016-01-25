(function() {
    tinymce.PluginManager.add('hidelinks_button', function( editor, url ) {
        
        editor.addButton( 'hidelinks_button', {
            title: 'Установите курсор на ссылку в редакторе и нажмите кнопку, чтобы закрыть от индексации гиперссылку',
            image: url + '/hidelinks.gif',

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

                } 

                node.parentNode.insertBefore( startTagText, node ); 
                node.parentNode.insertBefore( endTagText, node.nextSibling );
                editor.controlManager.setActive('hidelinks_button', state);
            }
        });
        
        editor.onNodeChange.add(function(ed, cm, node) {
                cm.setDisabled('hidelinks_button', !(node.tagName == 'A'))

                var node = editor.selection.getNode();
                if ( node ) {

                    var prev = node.previousSibling,
                        next = node.nextSibling,
                        state = false;

                    if( prev && next) {
                        if ( -1 != next.textContent.search('\[\/link\]') && -1 != prev.textContent.search('\[link\]') ) {
                            state = true;
                        } 
                    }
                }
                editor.controlManager.setActive('hidelinks_button', state);

        });

    });
})();