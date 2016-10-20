$(document).foundation();
Foundation.Keyboard.register('DropdownMenu',{
//  'ENTER': 'open',
    'SPACE': 'open',
    'ARROW_RIGHT': 'next',
    'ARROW_UP': 'up',
    'ARROW_DOWN': 'down',
    'ARROW_LEFT': 'previous',
    'ESCAPE': 'close'
});
$(document).ready(function(){
	$("a[rel^='prettyPhoto']").prettyPhoto();
});