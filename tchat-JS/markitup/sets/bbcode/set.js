// ----------------------------------------------------------------------------
// markItUp!
// ----------------------------------------------------------------------------
// Copyright (C) 2011 Jay Salvat
// http://markitup.jaysalvat.com/
// ----------------------------------------------------------------------------
// Html tags
// http://en.wikipedia.org/wiki/html
// ----------------------------------------------------------------------------
// Basic set. Feel free to add more tags
// ----------------------------------------------------------------------------
function keyPressed(e) { 
				shiftKey = e.shiftKey;
                                                                        if (e.keyCode === 13 || e.keyCode === 10) { // Enter key
						if (ctrlKey === true) {  // Enter + Ctrl
							ctrlKey = false;
							markup(options.onCtrlEnter);
							return options.onCtrlEnter.keepDefault;
						} else if (shiftKey === true) { // Enter + Shift
							shiftKey = false;
							markup(options.onShiftEnter);
							return options.onShiftEnter.keepDefault;
						} else { // only Enter
							markup(options.onEnter);
							return options.onEnter.keepDefault;
						}
					}
}


var mySettings = {
	onTab:    		{keepDefault:false, replaceWith:'    '},
	markupSet:  [ 	
		{name:'Gras', key:'B', openWith:'[b]', closeWith:'[/b]' },
		{name:'Italique', key:'I', openWith:'[i]', closeWith:'[/i]'  },
		{name:'Sous ligné', key:'U', openWith:'[u]', closeWith:'[/u]' },
		{separator:'---------------' },
		//{name:'Bulleted List', openWith:'    <li>', closeWith:'</li>', multiline:true, openBlockWith:'<ul>\n', closeBlockWith:'\n</ul>'},
		//  {name:'Numeric List', openWith:'    <li>', closeWith:'</li>', multiline:true, openBlockWith:'<ol>\n', closeBlockWith:'\n</ol>'},
		//{separator:'---------------' },
		{name:'Images', key:'P', replaceWith:'[img][![URL de l\'image:!:http://]!][/img]' },
		{name:'Lien', key:'L', openWith:'[url=[![Lien:!:http://]!]]', closeWith:'[/url]', placeHolder:'Ici le texte de votre lien...' },
	]
        
}
