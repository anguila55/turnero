(function (factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        // Node/CommonJS style for Browserify
        module.exports = factory;
    } else {
        // Browser globals
        factory(jQuery);
    }
}(
    /**
     * @param {jQuery} $
     */
    function($) {
        // disable drop open behavior
        $('html').on('dragover drop', function(e) { e.preventDefault() });

        $.fn.scrollbars = function(a,b,c) {
            if(window.isMobile || window.isTouch) {//} && window.isTouch) {
                switch(a) {
                    case 'scrollTo':
                        return this.scrollTop(b);
                    // case 'update':
                    // 	return this.mCustomScrollbar('update');
                    case '':
                        return this;
                    default:
                        if(typeof a == 'object' && typeof b == 'undefined') {
                            this.css('overflow', 'auto')
                        }
                        return this;
                }
            } else {
                return this.mCustomScrollbar(a,b,c);
            }
        }

        $.fn.calendar = function (opt,val) {
            var self = this;
            if(typeof opt === 'string' && typeof val !== 'undefined') switch(opt) { // setter | method with args

                // return this;
            }
            else if(typeof opt === 'string') switch(opt) { // getter | method with no args
                // return;
            }
            var def = {
                date: new Date(),
                noAvailable : ['2020-04-07'],
                autoSelect: false,
                select: function(date) {},
                toggle: function(y, m) {},
                check: function(noAvailable) {},
            }
            var current = {
                y: def.date.getFullYear(),
                m: def.date.getMonth()+1,
                d: def.date.getDate(),
            }
            var selected = {
                y: 0,
                m: 0,
                d: 0,
            }
            def.check.bind(self)(33);

            $(this).prop('selected', selected);
            def = $.extend(def, opt);
            var weekDays = 'Domingo Lunes Martes Miercoles Jueves Viernes Sabado'.split(' ');
            var yearMonths = 'Enero Febrero Marzo Abril Mayo Junio Julio Agosto Septiembre Octubre Noviembre Diciembre'.split(' ');
            // var yearMonthsShort = 'Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec'.split(' ');
            var today = new Date();
            var todayDate = today.getDate();
            var makeMonth = function(y,m,d) {
                var body = $('<table>')
                    .addClass('month-body')
                    .appendTo(month)
                var week = $('<thead>')
                    .addClass('month-week')
                    .appendTo(body)
                    .append('<tr></tr>')
                    .find('tr')
                var days = $('<tbody>')
                    .addClass('month-days')
                    .appendTo(body)
                for(i=0;i<7;i++) {
                    if (i === 0) {
                        week.append('<th class="text-disabled">'+weekDays[i]+'</th>');
                    } else {
                        week.append('<th>'+weekDays[i]+'</th>');
                    }
                }
                var date = new Date(y,m-1,1);
                var today = new Date();
                var todayDate = today.getDate();
                var thisMonth = !!(today.getMonth()+1 === m);

                // date.setFullYear(y,m-1,1);
                var numDays = (new Date(y,m,0)).getDate();
                var numWeeks = Math.ceil((numDays + date.getDay())/7);
                var day = 1;
                // console.log(date.getDay(), date.getMonth(), numDays);
                // for(var i=0; i<numWeeks; i++) {
                for(var i=0; i<6; i++) {
                    var wk = $('<tr>').appendTo(days);
                    for(var j=0;j<7;j++) {
                        if((i===0 && j<date.getDay()) || (day>numDays)) {
                            wk.append('<td></td>')
                            // wk.append('<td class="fade"> - </td>')
                            // continue;
                        } else {
                            $('<td>')
                                .text(day < 10 ? '0'+day : day)
                                // .addClass(day === d ? 'active' : '')
                                .addClass(j === 0 ? 'disabled' : '')
                                .addClass(def.noAvailable.find(num => num === y+'-'+m+'-'+day) ? 'today' : '')
                                .attr('data-date', day)
                                .text(day+'.')
                                // .ripple({ type: 'icon' })
                                .appendTo(wk)
                                .click(function(e) {
                                    $(this).parent().parent().find('.active').removeClass('active')
                                    $(this).addClass('active')
                                    selectDate(y, m, parseInt($(this).attr('data-date')))
                                })
                            day++;
                        }
                    }
                    // if(wk.text().trim() === '' && days.children(':first').text().split(' ').join('').split('0').join('').length === 7) wk.prependTo(days);
                    if(i === 5 && days.children(':first').text().split(' ').join('').split('0').join('').length === 7) wk.prependTo(days);
                }
                // days.find('td[data-date]').ripple({ type: 'centered' })
                days.find('td[data-date]').ripple()
                if(def.autoSelect) {
                    days.find('td[data-date="'+d+'"]').click()//.addClass('active')
                }
                return body;
            }
            var selectDate = function(y,m,d) {
                selected.d = d;
                selected.m = m;
                selected.y = y;
                var dt = new Date(y,m-1,d);
                def.select.bind(self)(dt);
            }
            var bringMonth = function(p_n,y,m,d) {
                isMoving = true;
                month.addClass('no-overflow');
                yMon.text(yearMonths[m-1])
                yrnm.text(y)
                // yrbd.find('.active').removeClass('active')
                // yrbd.find('[data-month="'+m+'"]').addClass('active')
                if(d === null && y === selected.y && m === selected.m) d = selected.d;
                var mon = makeMonth(y,m,d)
                    .addClass(p_n)
                    .insertBefore(body)
                def.toggle.bind(self)(current.y, def.noAvailable);
                def.check.bind(self)(def.noAvailable);

                // requestAnimationFrame(function() {
                setTimeout(function() {
                    mon.addClass('come')
                }, 1000/60)
                body.one('transitionend', function(e) {
                    body.remove()
                    body = mon;
                    body.removeClass(p_n+' come')
                    month.removeClass('no-overflow');
                    // def.toggle.bind(self)(current.y, current.m);
                    isMoving = false;
                })
            }

            var showYearPicker = function(e) {
                year.addClass('visible')
            }
            var isMoving = false;
            var date = def.date;
            // var month = $('<div>')
            var month = $(this[0])
                .addClass('nao-month')
            // .appendTo(dpkr)
            var btn1 = $('<button>')
                .addClass('ic ic-arrow-circle-fat-left')
                .ripple()
                .attr('title', 'Previous month')
                .click(function(e) {
                    e.preventDefault();
                    if(isMoving) return;
                    current.m = current.m-1 === 0 ? 12 : current.m-1;
                    current.y = current.m === 12 ? current.y-1 : current.y;
                    bringMonth('prev', current.y, current.m, null);
                })
            var btn2 = $('<button>')
                .addClass('ic ic-arrow-circle-fat-right')
                .ripple()
                .attr('title', 'Next month')
                .click(function(e) {
                    e.preventDefault();
                    if(isMoving) return;
                    current.m = current.m+1 === 13 ? 1 : current.m+1;
                    current.y = current.m === 1 ? current.y+1 : current.y;
                    bringMonth('next', current.y, current.m, null);
                })
                var yMon = $('<div>')
                    .text(yearMonths[date.getMonth()])

                var head = $('<div>')
                    .addClass('col-lg-12 d-flex')
                    .appendTo(month)

                var head2 = $('<div>')
                    .addClass('col-lg-3 month-head mb-2 px-0 justify-content-between')
                    .appendTo(month)
                    .append(btn1)
                    .append(yMon)
                    .append(btn2)
                    .appendTo(head)

                var head3 = $('<div>')
                    .addClass('col-lg-9 month-text mb-2  px-0')
                    .appendTo(head)

                var head2 = $('<div>')
                    .addClass('ic ic-radio-full-filled custom-text available')
                    .appendTo(head3)

                var head2 = $('<div>')
                    .addClass('custom-text ml-2 mr-3')
                    .text(' Libre')
                    .appendTo(head3)

                var head2 = $('<div>')
                    .addClass('ic ic-radio-full-filled custom-text noAvailable mr-1')
                    .appendTo(head3)

                var head2 = $('<div>')
                    .addClass('custom-text mx-1')
                    .text('Ocupado')
                    .appendTo(head3)

                var body = makeMonth(current.y, current.m, (opt && opt.date) ? current.d : null)
                    .appendTo(month)
                var togg = def.toggle.bind(self)(current.y, current.m)

                var yrnx = $('<button>')
                    // .addClass('span')
                    .addClass('ic ic-arrow-angle-right pl-0')
                    .ripple()
                    .click(function(e) {
                        e.preventDefault();
                        if(isMoving) return;
                        current.y++;
                        yrnm.text(current.y)
                        bringMonth('next', current.y, current.m, null);
                    })
                    .focus(showYearPicker)
                var yrpv = $('<button>')
                    // .addClass('span')
                    .addClass('ic ic-arrow-angle-left')
                    .ripple()
                    .click(function(e) {
                        e.preventDefault();
                        if(isMoving) return;
                        current.y--;
                        yrnm.text(current.y)
                        bringMonth('prev', current.y, current.m, null);
                    })
                    .focus(showYearPicker)
                var yrnm = $('<div>')
                    .text(current.y)
                    .attr('title', 'Go back to calendar')
                var yrhd = $('<div>')
                    .addClass('month-head')
                    .append(yrpv)
                    .append(yrnx)
                    .append(yrnm)

                return this;
            }
            return $;
        }));
