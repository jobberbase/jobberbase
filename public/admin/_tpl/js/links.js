(function() {
	jobberBase.links = function() {
		var linkTemplate =
			'<div class="linkItem">\
				<div class="linkHandle"></div>\
				<div class="linkWrapper">\
					<div class="buttons">\
						<a href="#" title="Move this link up" class="moveLinkUp"><img src="{JOBBER_ADMIN_URL}_tpl/img/arrow-up.png" alt="Move up" /></a>\
						<a href="#" title="Move this link down" class="moveLinkDown"><img src="{JOBBER_ADMIN_URL}_tpl/img/arrow-down.png" alt="Move down" /></a>\
						<a href="#" title="Unnest this link" class="unnestLink"><img src="{JOBBER_ADMIN_URL}_tpl/img/arrow-left.png" alt="Unnest" /></a>\
						<a href="#" title="Nest this link" class="nestLink"><img src="{JOBBER_ADMIN_URL}_tpl/img/arrow-right.png" alt="Nest" /></a>\
						<a href="#" title="Delete this link" class="deleteLink"><img src="{JOBBER_ADMIN_URL}_tpl/img/bin.png" alt="Delete" /></a>\
					</div>\
					<label><span>Name:</span><input type="text" size="60" name="name[]" value="For example: Jobberbase" /><img class="help" src="../../_tpl/img/information-balloon.png" title="The text you want to display in the frontend" /></label>\
					<a href="#" title="Save changes" class="saveLink"><img src="{JOBBER_ADMIN_URL}_tpl/img/disk.png" alt="Save" /></a>\
					<label><span>URL:</span><input type="text" size="60" name="url[]" value="For example: http://www.jobberbase.com/" /><img class="help" src="../../_tpl/img/information-balloon.png" title="The URL you want to link to. When you want to link to a Jobberbase page (e.g. the page Contact) you can use the Jobberbase URL (e.g. contact)" /></label>\
					<label><span>Title:</span><input type="text" size="60" name="title[]" value="For example: Open Source Job Board Software" /><img class="help" src="../../_tpl/img/information-balloon.png" title="Text that shows when you hover over the link, just like this help message. You can leave this blank if you don\'t want to show anything" /></label>\
				</div>\
				<div class="linkChildren"></div>\
			</div>';
		var pointerPosition;
		var prevPointer;
		var minTop;
		var maxTop
		var currentEl;
		var elOrigPrev;
		var elOrigNext;
		var fieldOrigValue;
		var items;
		var saving = false;

/* HTML5 Drag&Drop - unfinished
		var dragStart = function(e) {
			var dragTarget = $(e.target).parents('.linkItem')[0];
			e.originalEvent.dataTransfer.effectAllowed = 'move';
			e.originalEvent.dataTransfer.setData('text/html', dragTarget.outerHTML);
			e.originalEvent.dataTransfer.setDragImage(dragTarget,-20,-20);
			return true;
		}
*/
/* Original Drag&Drop - won't work with nested menus correctly
		var linksMouseDown = function(e) {
			if ($(e.target).is('div.linkHandle') && saving == false) {
				currentEl = $(e.target.parentNode)
								.fadeTo(500, 0.4)
								.addClass('draggingItem')
								.get(0);
				elOrigPrev = currentEl.previousSibling;
				elOrigNext = currentEl.nextSibling;
				pointerPosition = e.pageY;
				minTop = -currentEl.offsetTop;
				maxTop = document.getElementById('linksContainer').offsetHeight - currentEl.offsetHeight + minTop;
				items = $('#linksContainer div.linkItem');
				$(document)
					.bind('mousemove', linksMouseMove)
					.bind('mouseup', linksMouseUp);
				return false;
			}
		};
		
		var linksMouseMove = function(e) {
			var newTop = Math.max(minTop,Math.min(maxTop, e.pageY - pointerPosition));
			var absTop = e.pageY - pointerPosition - minTop;
			currentEl.style.top = newTop + 'px';
			items.each(function(nr){
				if (this != currentEl) {
					var overlap = (absTop - this.offsetTop)/this.offsetHeight;
					if (overlap > 0 && overlap < 1) {
						var oldTop = minTop;
						minTop = -this.offsetTop;
						maxTop = document.getElementById('linksContainer').offsetHeight - currentEl.offsetHeight + minTop;
						if (e.pageY > prevPointer) {
							$(this).after(currentEl);
						} else {
							$(this).before(currentEl);
						}
						pointerPosition = pointerPosition  + oldTop - minTop;
						return false;
					}
				}
			});
			prevPointer = e.pageY;
			return false;
		};
		
		var linksMouseUp = function(e) {
			$(document)
				.unbind('mousemove', linksMouseMove)
				.unbind('mouseup', linksMouseUp);
			$(currentEl)
				.fadeTo(500,1)
				.css('top', '0')
				.removeClass('draggingItem');
			if (currentEl.nextSibling != elOrigNext ||  currentEl.previousSibling != elOrigPrev) {
				jobberBase.messages.add('Link order changed. Saving ...');
				saving = true;
				jobberBase.overlay.show(document.getElementById('linksContainer'));
				var order = [];
				$('#linksContainer div.linkItem')
					.each(function(nr){
						order.push($(this).attr('rel'));
					});
				$.ajax({
					type: 'post',
					url: Jobber.jobber_admin_url + 'links/',
					data: {
						action: 'saveOrder',
						order: order.join(',')
					},
					complete: function(){
						jobberBase.overlay.hide();
						saving = false;
					}
				});
			}
			currentEl = elOrigPrev = elOrigNext = null;
			return false;
		};
*/
		var linksMouseClick = function(e) {
			var el = $(e.target).is('img')? e.target.parentNode : e.target;
			if ($(el).is('a.deleteLink')) {
				if (confirm('Are you sure you want to delete this link, as well as all its descendants?')) {
					saving = true;
					var linkItem = $(el).parents('.linkItem').eq(0);
					jobberBase.overlay.show(linkItem);
					$.ajax({
						type: 'post',
						dataType: 'text',
						url: Jobber.jobber_admin_url + 'links/',
						data: {
							action: 'deleteLink',
							link: linkItem.attr('rel')
						},
						success: function(responseText) {
							if (typeof responseText == 'string' && responseText.length > 0) {
								alert(responseText);
							} else {
								linkItem
									.fadeOut(
										500, 
										function(){
											$(this).remove()
										}
									);
								jobberBase.messages.add('Link has been deleted');
							}
						},
						complete: function(){
							jobberBase.overlay.hide();
							saving = false;
						}
					});
					this.blur();
					return false;
				}
			} else if ($(el).is('a.saveLink')) {
				jobberBase.overlay.show(el.parentNode.parentNode);
				saving = true;
				var linkItem = $(el).parents('.linkItem').eq(0);
				$.ajax({
					type: 'post',
					dataType: 'text',
					url: Jobber.jobber_admin_url + 'links/',
					data: {
						action: 'saveLink',
						link: linkItem.attr('rel'),
						name: linkItem.find('input:first').val(),
						url: linkItem.find('input:eq(1)').val(),
						title: linkItem.find('input:eq(2)').val()
					},
					success: function() {
						jobberBase.messages.add('Link has been saved');
						$(el).hide();
					},
					complete: function(){
						jobberBase.overlay.hide();
						saving = false;
					}
				});
				this.blur();
				return false;
			} else if ($(el).is('a.moveLinkUp')) {
				var linkItem = $(el).parents('.linkItem').eq(0);
				var previousLinkItem = linkItem.prev('.linkItem');
				if (previousLinkItem) {
					linkItem.after(previousLinkItem);
				}
				linksSaveOrder();
				this.blur();
				return false;
			} else if ($(el).is('a.moveLinkDown')) {
				var linkItem = $(el).parents('.linkItem').eq(0);
				var nextLinkItem = linkItem.next('.linkItem');
				if (nextLinkItem) {
					linkItem.before(nextLinkItem);
				}
				linksSaveOrder();
				this.blur();
				return false;
			} else if ($(el).is('a.unnestLink')) {
				var parentLinkItems = $(el).parents('.linkItem');
				if (parentLinkItems.length >= 2) {
					parentLinkItems.eq(1).after(parentLinkItems.eq(0));
				}
				linksSaveOrder();
				this.blur();
				return false;
			} else if ($(el).is('a.nestLink')) {
				var linkItem = $(el).parents('.linkItem').eq(0);
				var prevLinkItem = linkItem.prev('.linkItem').eq(0);
				if (prevLinkItem) {
					prevLinkItem.find('.linkChildren').eq(0).append(linkItem);
				}
				linksSaveOrder();
				this.blur();
				return false;
			}
		};
		
		var linksInputFocus = function(e) {
			fieldOrigValue = this.value;
		};
		
		var linksInputBlur = function(e) {
			if (this.value != fieldOrigValue) {
				$(this)
					.parent()
					.parent()
					.find('a:last')
						.fadeIn(500);
						
				jobberBase.messages.add('Value changed. You must save the change!');
			}
		};
		
		var linksAdd = function(e) {
			this.blur();
			if (saving === true) {
				return false;
			}
			var el = $('#linksContainer')
					.append(linkTemplate.replace('{JOBBER_ADMIN_URL}', Jobber.jobber_admin_url, 'g'))
					.find('div.linkItem:last')
						.find('input')
							.bind('focus', linksInputFocus)
							.bind('blur', linksInputBlur)
							.end()
						.hide()
						.fadeIn(500)
						.get(0);
			jobberBase.overlay.show(el);
			
			$.ajax({
				type: 'post',
				dataType: 'text',
				url: document.location.href,
				data: {
					action: 'newLink'
				},
				success: function(id) {
					$(el)
						.attr('rel', id)
						.find('input:first')
							.attr('name', 'name' + id)
							.end()
						.find('input:eq(1)')
					        .attr('name', 'url' + id )
					        .end()
					    .find('input:eq(2)')
					        .attr('name', 'title' + id )
					        .end()
				},
				complete: function(){
					jobberBase.overlay.hide();
					saving = false;
				}
			});
			return false;
		};
		var linksSaveOrder = function() {
			jobberBase.messages.add('Link order changed. Saving ...');
			saving = true;
			jobberBase.overlay.show(document.getElementById('linksContainer'));
			var order = {};
			order.id = $('#linksContainer').attr('rel');
			order.children = [];
			var children = $('#linksContainer').children('.linkItem');
			for (var i = 0; i < children.length; i++){
				order.children.push(linksGetOrder(children.eq(i)));
			}
			console.log(JSON.stringify(order));
			$.ajax({
				type: 'post',
				url: Jobber.jobber_admin_url + 'links/',
				data: {
					action: 'saveOrder',
					order: JSON.stringify(order)
				},
				complete: function(){
					jobberBase.overlay.hide();
					saving = false;
				}
			});
		}
		var linksGetOrder = function(element) {
			var ret = {};
			ret.id = element.attr('rel');
			ret.children = [];
			var children = element.children('.linkChildren').children('.linkItem');
			for (var i = 0; i < children.length; i++){
				ret.children.push(linksGetOrder(children.eq(i)));
			}
			return ret;
		}
		return {
			init: function(){
				if (document.getElementById('linksContainer')) {
					$('#linksContainer')
						//.bind('mousedown', linksMouseDown)
						.bind('click', linksMouseClick)
						.find('input')
							.bind('focus', linksInputFocus)
							.bind('blur', linksInputBlur)
							.end();
					$('.addNewLink').bind('click', linksAdd);
					//$('.linkHandle').bind('dragstart', dragStart);
				}
			}
		};
	}();
	jobberBase.register(jobberBase.links.init, 'init');
})();
