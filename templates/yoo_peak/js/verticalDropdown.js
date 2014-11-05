/* Copyright (C) YOOtheme GmbH, YOOtheme Proprietary Use License (http://www.yootheme.com/license) */

(function($){$.fn.verticalDropdown=function(options){var $this=$(this),dropdowns=$this.find(".uk-dropdown"),element=$this.find("> ul > li"),enter;element.removeAttr("data-uk-dropdown"),$this.on("mouseenter",function(){enter=1;if(!$.UIkit.support.transition){$this.addClass("uk-open")}});$this.find(".uk-dropdown").on("transitionend animationend webkitTransitionEnd webkitAnimationEnd",function(){if(enter)$this.addClass("uk-open")});function exitNav(){enter=0;$this.removeClass("uk-open");element.removeClass("uk-open");return true}function activateDropdown(row){$(row).addClass("uk-open")}function deactivateDropdown(row){$(row).removeClass("uk-open")}$this.menuAim({activate:activateDropdown,deactivate:deactivateDropdown,exitMenu:exitNav,rowSelector:"> ul > li",submenuSelector:"uk-parent",tolerance:200})};$.fn.menuAim=function(opts){this.each(function(){init.call(this,opts)});return this};function init(opts){var $menu=$(this),activeRow=null,mouseLocs=[],lastDelayLoc=null,timeoutId=null,options=$.extend({rowSelector:"> li",submenuSelector:"*",submenuDirection:"right",tolerance:75,enter:$.noop,exit:$.noop,activate:$.noop,deactivate:$.noop,exitMenu:$.noop,exitDelay:1e3},opts);var MOUSE_LOCS_TRACKED=3,DELAY=300;var mousemoveDocument=function(e){mouseLocs.push({x:e.pageX,y:e.pageY});if(mouseLocs.length>MOUSE_LOCS_TRACKED){mouseLocs.shift()}};var mouseleaveMenu=function(){if(timeoutId){clearTimeout(timeoutId)}timeoutId=setTimeout(function(){if(options.exitMenu(this)){if(activeRow){options.deactivate(activeRow)}activeRow=null}},options.exitDelay)};var mouseenterRow=function(){if(timeoutId){clearTimeout(timeoutId)}options.enter(this);possiblyActivate(this)},mouseleaveRow=function(){options.exit(this)};var clickRow=function(){activate(this)};var activate=function(row){if(row==activeRow){return}if(activeRow){options.deactivate(activeRow)}options.activate(row);activeRow=row};var possiblyActivate=function(row){var delay=activationDelay();if(delay){timeoutId=setTimeout(function(){possiblyActivate(row)},delay)}else{activate(row)}};var activationDelay=function(){if(!activeRow){return 0}var offset=$menu.offset(),upperLeft={x:offset.left,y:offset.top-options.tolerance},upperRight={x:offset.left+$menu.outerWidth(),y:upperLeft.y},lowerLeft={x:offset.left,y:offset.top+$menu.outerHeight()+options.tolerance},lowerRight={x:offset.left+$menu.outerWidth(),y:lowerLeft.y},loc=mouseLocs[mouseLocs.length-1],prevLoc=mouseLocs[0];if(!loc){return 0}if(!prevLoc){prevLoc=loc}if(prevLoc.x<offset.left||prevLoc.x>lowerRight.x||prevLoc.y<offset.top||prevLoc.y>lowerRight.y){return 0}if(lastDelayLoc&&loc.x==lastDelayLoc.x&&loc.y==lastDelayLoc.y){return 0}function slope(a,b){return(b.y-a.y)/(b.x-a.x)}var decreasingCorner=upperRight,increasingCorner=lowerRight;if(options.submenuDirection=="left"){decreasingCorner=lowerLeft;increasingCorner=upperLeft}else if(options.submenuDirection=="below"){decreasingCorner=lowerRight;increasingCorner=lowerLeft}else if(options.submenuDirection=="above"){decreasingCorner=upperLeft;increasingCorner=upperRight}var decreasingSlope=slope(loc,decreasingCorner),increasingSlope=slope(loc,increasingCorner),prevDecreasingSlope=slope(prevLoc,decreasingCorner),prevIncreasingSlope=slope(prevLoc,increasingCorner);if(decreasingSlope<prevDecreasingSlope&&increasingSlope>prevIncreasingSlope){lastDelayLoc=loc;return DELAY}lastDelayLoc=null;return 0};$menu.mouseleave(mouseleaveMenu).find(options.rowSelector).mouseenter(mouseenterRow).mouseleave(mouseleaveRow).click(clickRow);$(document).mousemove(mousemoveDocument)}})(jQuery);