if (typeof jQuery === "undefined") {
    throw new Error("jQuery plugins need to be before this file");
}

$.AdminBSB = {};
$.AdminBSB.options = {
    colors: {
        red: '#F44336',
        pink: '#E91E63',
        purple: '#9C27B0',
        deepPurple: '#673AB7',
        indigo: '#3F51B5',
        blue: '#2196F3',
        lightBlue: '#03A9F4',
        cyan: '#00BCD4',
        teal: '#009688',
        green: '#4CAF50',
        lightGreen: '#8BC34A',
        lime: '#CDDC39',
        yellow: '#ffe821',
        amber: '#FFC107',
        orange: '#FF9800',
        deepOrange: '#FF5722',
        brown: '#795548',
        grey: '#9E9E9E',
        blueGrey: '#607D8B',
        black: '#000000',
        white: '#ffffff'
    },
    leftSideBar: {
        scrollColor: 'rgba(0,0,0,0.5)',
        scrollWidth: '4px',
        scrollAlwaysVisible: false,
        scrollBorderRadius: '0',
        scrollRailBorderRadius: '0',
        scrollActiveItemWhenPageLoad: true,
        breakpointWidth: 1170
    },
    dropdownMenu: {
        effectIn: 'fadeIn',
        effectOut: 'fadeOut'
    }
}

/* Left Sidebar - Function =================================================================================================
*  You can manage the left sidebar menu options
*  
*/
$.AdminBSB.leftSideBar = {
    activate: function () {
        var _this = this;
        var $body = $('body');
        var $overlay = $('.overlay');

        //Close sidebar
        $(window).click(function (e) {
            var $target = $(e.target);
            if (e.target.nodeName.toLowerCase() === 'i') { $target = $(e.target).parent(); }

            if (!$target.hasClass('bars') && _this.isOpen() && $target.parents('#leftsidebar').length === 0) {
                if (!$target.hasClass('js-right-sidebar')) $overlay.fadeOut();
                $body.removeClass('overlay-open');
            }
        });

        $.each($('.menu-toggle.toggled'), function (i, val) {
            $(val).next().slideToggle(0);
        });

        //When page load
        $.each($('.menu .list li.active'), function (i, val) {
            var $activeAnchors = $(val).find('a:eq(0)');

            $activeAnchors.addClass('toggled');
            $activeAnchors.next().show();
        });

        //Collapse or Expand Menu
        $('.menu-toggle').on('click', function (e) {
            var $this = $(this);
            var $content = $this.next();

            if ($($this.parents('ul')[0]).hasClass('list')) {
                var $not = $(e.target).hasClass('menu-toggle') ? e.target : $(e.target).parents('.menu-toggle');

                $.each($('.menu-toggle.toggled').not($not).next(), function (i, val) {
                    if ($(val).is(':visible')) {
                        $(val).prev().toggleClass('toggled');
                        $(val).slideUp();
                    }
                });
            }

            $this.toggleClass('toggled');
            $content.slideToggle(320);
        });

        //Set menu height
        _this.setMenuHeight();
        _this.checkStatuForResize(true);
        $(window).resize(function () {
            _this.setMenuHeight();
            _this.checkStatuForResize(false);
        });

        //Set Waves
        Waves.attach('.menu .list a', ['waves-block']);
        Waves.init();
    },
    setMenuHeight: function (isFirstTime) {
        if (typeof $.fn.slimScroll != 'undefined') {
            var configs = $.AdminBSB.options.leftSideBar;
            var height = ($(window).height() - ($('.legal').outerHeight() + $('.user-info').outerHeight() + $('.navbar').innerHeight()));
            var $el = $('.list');

            $el.slimscroll({
                height: height + "px",
                color: configs.scrollColor,
                size: configs.scrollWidth,
                alwaysVisible: configs.scrollAlwaysVisible,
                borderRadius: configs.scrollBorderRadius,
                railBorderRadius: configs.scrollRailBorderRadius
            });

            //Scroll active menu item when page load, if option set = true
            if ($.AdminBSB.options.leftSideBar.scrollActiveItemWhenPageLoad) {
                var activeItemOffsetTop = $('.menu .list li.active')[0].offsetTop
                if (activeItemOffsetTop > 150) $el.slimscroll({ scrollTo: activeItemOffsetTop + 'px' });
            }
        }
    },
    checkStatuForResize: function (firstTime) {
        var $body = $('body');
        var $openCloseBar = $('.navbar .navbar-header .bars');
        var width = $body.width();

        if (firstTime) {
            $body.find('.content, .sidebar').addClass('no-animate').delay(1000).queue(function () {
                $(this).removeClass('no-animate').dequeue();
            });
        }

        if (width < $.AdminBSB.options.leftSideBar.breakpointWidth) {
            $body.addClass('ls-closed');
            $openCloseBar.fadeIn();
        }
        else {
            $body.removeClass('ls-closed');
            $openCloseBar.fadeOut();
        }
    },
    isOpen: function () {
        return $('body').hasClass('overlay-open');
    }
};
//==========================================================================================================================

/* Right Sidebar - Function ================================================================================================
*  You can manage the right sidebar menu options
*  
*/
$.AdminBSB.rightSideBar = {
    activate: function () {
        var _this = this;
        var $sidebar = $('#rightsidebar');
        var $overlay = $('.overlay');

        //Close sidebar
        $(window).click(function (e) {
            var $target = $(e.target);
            if (e.target.nodeName.toLowerCase() === 'i') { $target = $(e.target).parent(); }

            if (!$target.hasClass('js-right-sidebar') && _this.isOpen() && $target.parents('#rightsidebar').length === 0) {
                if (!$target.hasClass('bars')) $overlay.fadeOut();
                $sidebar.removeClass('open');
            }
        });

        $('.js-right-sidebar').on('click', function () {
            $sidebar.toggleClass('open');
            if (_this.isOpen()) { $overlay.fadeIn(); } else { $overlay.fadeOut(); }
        });
    },
    isOpen: function () {
        return $('.right-sidebar').hasClass('open');
    }
}
//==========================================================================================================================

/* Searchbar - Function ================================================================================================
*  You can manage the search bar
*  
*/
var $searchBar = $('.search-bar');
$.AdminBSB.search = {
    activate: function () {
        var _this = this;

        //Search button click event
        $('.js-search').on('click', function () {
            _this.showSearchBar();
        });

        //Close search click event
        $searchBar.find('.close-search').on('click', function () {
            _this.hideSearchBar();
        });

        //ESC key on pressed
        $searchBar.find('input[type="text"]').on('keyup', function (e) {
            if (e.keyCode == 27) {
                _this.hideSearchBar();
            }
        });
    },
    showSearchBar: function () {
        $searchBar.addClass('open');
        $searchBar.find('input[type="text"]').focus();
    },
    hideSearchBar: function () {
        $searchBar.removeClass('open');
        $searchBar.find('input[type="text"]').val('');
    }
}
//==========================================================================================================================

/* Navbar - Function =======================================================================================================
*  You can manage the navbar
*  
*/
$.AdminBSB.navbar = {
    activate: function () {
        var $body = $('body');
        var $overlay = $('.overlay');

        //Open left sidebar panel
        $('.bars').on('click', function () {
            $body.toggleClass('overlay-open');
            if ($body.hasClass('overlay-open')) { $overlay.fadeIn(); } else { $overlay.fadeOut(); }
        });

        //Close collapse bar on click event
        $('.nav [data-close="true"]').on('click', function () {
            var isVisible = $('.navbar-toggle').is(':visible');
            var $navbarCollapse = $('.navbar-collapse');

            if (isVisible) {
                $navbarCollapse.slideUp(function () {
                    $navbarCollapse.removeClass('in').removeAttr('style');
                });
            }
        });
    }
}
//==========================================================================================================================

/* Input - Function ========================================================================================================
*  You can manage the inputs(also textareas) with name of class 'form-control'
*  
*/
$.AdminBSB.input = {
    activate: function () {
        //On focus event
        $('.form-control').focus(function () {
            $(this).parent().addClass('focused');
        });

        //On focusout event
        $('.form-control').focusout(function () {
            var $this = $(this);
            if ($this.parents('.form-group').hasClass('form-float')) {
                if ($this.val() == '') { $this.parents('.form-line').removeClass('focused'); }
            }
            else {
                $this.parents('.form-line').removeClass('focused');
            }
        });

        //On label click
        $('body').on('click', '.form-float .form-line .form-label', function () {
            $(this).parent().find('input').focus();
        });

        //Not blank form
        $('.form-control').each(function () {
            if ($(this).val() !== '') {
                $(this).parents('.form-line').addClass('focused');
            }
        });
    }
}
//==========================================================================================================================

/* Form - Select - Function ================================================================================================
*  You can manage the 'select' of form elements
*  
*/
$.AdminBSB.select = {
    activate: function () {
        if ($.fn.selectpicker) { $('select:not(.ms)').selectpicker({
             dropupAuto: false,
        }); }
    }
}
//==========================================================================================================================

/* DropdownMenu - Function =================================================================================================
*  You can manage the dropdown menu
*  
*/

$.AdminBSB.dropdownMenu = {
    activate: function () {
        var _this = this;

        $('.dropdown, .dropup, .btn-group').on({
            "show.bs.dropdown": function () {
                var dropdown = _this.dropdownEffect(this);
                _this.dropdownEffectStart(dropdown, dropdown.effectIn);
            },
            "shown.bs.dropdown": function () {
                var dropdown = _this.dropdownEffect(this);
                if (dropdown.effectIn && dropdown.effectOut) {
                    _this.dropdownEffectEnd(dropdown, function () { });
                }
            },
            "hide.bs.dropdown": function (e) {
                var dropdown = _this.dropdownEffect(this);
                if (dropdown.effectOut) {
                    e.preventDefault();
                    _this.dropdownEffectStart(dropdown, dropdown.effectOut);
                    _this.dropdownEffectEnd(dropdown, function () {
                        dropdown.dropdown.removeClass('open');
                    });
                }
            }
        });

        //Set Waves
        Waves.attach('.dropdown-menu li a', ['waves-block']);
        Waves.init();
    },
    dropdownEffect: function (target) {
        var effectIn = $.AdminBSB.options.dropdownMenu.effectIn, effectOut = $.AdminBSB.options.dropdownMenu.effectOut;
        var dropdown = $(target), dropdownMenu = $('.dropdown-menu', target);

        if (dropdown.length > 0) {
            var udEffectIn = dropdown.data('effect-in');
            var udEffectOut = dropdown.data('effect-out');
            if (udEffectIn !== undefined) { effectIn = udEffectIn; }
            if (udEffectOut !== undefined) { effectOut = udEffectOut; }
        }

        return {
            target: target,
            dropdown: dropdown,
            dropdownMenu: dropdownMenu,
            effectIn: effectIn,
            effectOut: effectOut
        };
    },
    dropdownEffectStart: function (data, effectToStart) {
        if (effectToStart) {
            data.dropdown.addClass('dropdown-animating');
            data.dropdownMenu.addClass('animated dropdown-animated');
            data.dropdownMenu.addClass(effectToStart);
        }
    },
    dropdownEffectEnd: function (data, callback) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        data.dropdown.one(animationEnd, function () {
            data.dropdown.removeClass('dropdown-animating');
            data.dropdownMenu.removeClass('animated dropdown-animated');
            data.dropdownMenu.removeClass(data.effectIn);
            data.dropdownMenu.removeClass(data.effectOut);

            if (typeof callback == 'function') {
                callback();
            }
        });
    }
}
//==========================================================================================================================

/* Browser - Function ======================================================================================================
*  You can manage browser
*  
*/
var edge = 'Microsoft Edge';
var ie10 = 'Internet Explorer 10';
var ie11 = 'Internet Explorer 11';
var opera = 'Opera';
var firefox = 'Mozilla Firefox';
var chrome = 'Google Chrome';
var safari = 'Safari';

$.AdminBSB.browser = {
    activate: function () {
        var _this = this;
        var className = _this.getClassName();

        if (className !== '') $('html').addClass(_this.getClassName());
    },
    getBrowser: function () {
        var userAgent = navigator.userAgent.toLowerCase();

        if (/edge/i.test(userAgent)) {
            return edge;
        } else if (/rv:11/i.test(userAgent)) {
            return ie11;
        } else if (/msie 10/i.test(userAgent)) {
            return ie10;
        } else if (/opr/i.test(userAgent)) {
            return opera;
        } else if (/chrome/i.test(userAgent)) {
            return chrome;
        } else if (/firefox/i.test(userAgent)) {
            return firefox;
        } else if (!!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/)) {
            return safari;
        }

        return undefined;
    },
    getClassName: function () {
        var browser = this.getBrowser();

        if (browser === edge) {
            return 'edge';
        } else if (browser === ie11) {
            return 'ie11';
        } else if (browser === ie10) {
            return 'ie10';
        } else if (browser === opera) {
            return 'opera';
        } else if (browser === chrome) {
            return 'chrome';
        } else if (browser === firefox) {
            return 'firefox';
        } else if (browser === safari) {
            return 'safari';
        } else {
            return '';
        }
    }
}
//==========================================================================================================================

$(function () {
    $.AdminBSB.browser.activate();
    $.AdminBSB.leftSideBar.activate();
    $.AdminBSB.rightSideBar.activate();
    $.AdminBSB.navbar.activate();
    $.AdminBSB.dropdownMenu.activate();
    $.AdminBSB.input.activate();
    $.AdminBSB.select.activate();
    $.AdminBSB.search.activate();

    setTimeout(function () { $('.page-loader-wrapper').fadeOut(); }, 50);
    
    // CUSTOM FUNCTIONS

    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false
    });
    //
    function showNotification(colorName, text) {
        if (colorName === null || colorName === '') { colorName = 'bg-black'; }
        var allowDismiss = true;

        $.notify({
            message: text
        },
            {
                type: colorName,
                allow_dismiss: allowDismiss,
                newest_on_top: true,
                timer: 1000,
                placement: {
                    from: "top",
                    align: "right"
                },
                animate: {
                    enter: "animated zoomInRight",
                    exit: "animated zoomOutRight"
                },
                template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-35" : "") + '" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">x</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
            });
    }
    window.showNotification = showNotification;
    window.resetInputs = function () {
        $(".reset").trigger('click');
    }

    /**
    This is probably going to be the worst code to maintain.
    The several lines below implement filtering mechanisms just like in the access
    application. For example in lme dropdown, if you select an lme, we should be able to filter the
    clusters to be those lme is a member of. This same is for sub counties, wards e..t.c
    If you change clusters perform the same filtering for lmes, counties e.t.c
    Every dropdown is linked to another.
    This is why i was only able to come up with highly repetitive code below.

    */

    // TODO: Please maitain this code if you can.

    // Reset the cluster dropdown to the original values stored in solar.clusters
    function resetClusters () {
        if (solar.clusters.length) {
            $cluster_html = '';
            solar.clusters.map(function (c) {
                $cluster_html += '<option value="' + c.Cluster + '">' + c.Cluster + '</option>';
            });
            $("#cluster, #d_cluster").html($cluster_html);
            $("#cluster, #d_cluster").selectpicker("refresh");
        }
    }

    function resetSubCounties() {
        if (solar.sub_counties.length) {
            $subcounty_html = '';
            solar.sub_counties.map(function (c) {
                $subcounty_html += '<option value="' + c.SubCounty + '">' + c.SubCounty + '</option>';
            });
            $("#sub_county, #d_sub_county").html($subcounty_html);
            $("#sub_county, #d_sub_county").selectpicker("refresh");
        }
    }

    function resetCounties() {
        if(solar.counties.length) {
            $county_html = '';
            solar.counties.map(function (c) {
                $county_html += '<option value="' + c.County + '">' + c.County + '</option>';
            });
            $("#county, #d_county").html($county_html);
            $("#county, #d_county").selectpicker("refresh");
        }
    }

    function resetGroups() {
        if(solar.groups.length) {
            $group_html = '';
            solar.groups.map(function (c) {
                $group_html += '<option value="' + c.SGroup + '">' + c.SGroup + '</option>';
            });
            $("#group").html($group_html);
            $("#group").selectpicker("refresh");
        }
    }

    function resetWards() {
         if(solar.wards.length) {
            $ward_html = '';
            solar.wards.map(function (c) {
                $ward_html += '<option value="' + c.Ward + '">' + c.Ward + '</option>';
            });
            $("#ward").html($ward_html);
            $("#ward").selectpicker("refresh");
        }
    }

    function resetLmes() {
        if (solar.lmes.length) {
            $lme_html = '';
            solar.lmes.map(function (c) {
                $lme_html += 
                '<option data-cluster="' + c.Cluster +
                    '" data-county="' + c.County +
                    '" data-subcounty="' + c.SubCounty +
                    '"' + 'value="' +
                    c.LME_FirstName + ','
                    + c.LME_LastName + ',' +
                    c.id + '">' +
                    c.LME_FirstName + ' ' +
                    c.LME_LastName +
                '</option>';
           });
            $("#lme, #d_lme").html($lme_html);
            $("#lme, #d_lme").selectpicker("refresh");
        }
    }

    function resetMonitors() {
        if (solar.monitors.length) {
            $monitor_html = '';
            solar.monitors.map(function (c) {
                $monitor_html += 
                '<option data-cluster="' + c.Cluster +
                    '" data-county="' + c.County +
                    '" data-subcounty="' + c.SubCounty +
                    '"' + 'value="' + c.StoveBuilder + '">' + c.StoveBuilder +
                '</option>';
           });
            $("#monitor, #d_monitor").html($monitor_html);
            $("#monitor, #d_monitor").selectpicker("refresh");
        }
    }

     function resetBuilders() {
         if(solar.builders.length) {
            $builder_html = '';
            solar.builders.map(function (c) {
                builderr_html += 
                '<option data-cluster="' + c.Cluster +
                    '" data-county="' + c.County +
                    '" data-subcounty="' + c.SubCounty +
                    '"' + 'value="' + c.StoveBuilder + '">' + c.StoveBuilder +
                '</option>';
           });
            $("#builder, #d_builder").html($builder_html);
            $("#builder, #d_builder").selectpicker("refresh");
        }
    }

    function resetCoordinators() {
         if(solar.coordinators.length) {
            $coordinator_html = '';
            solar.coordinators.map(function (c) {
                console.log(c);
                $lme_html += 
                '<option data-cluster="' + c.Cluster +
                    '" data-county="' + c.County +
                    '" data-subcounty="' + c.SubCounty +
                    '"' + 'value="' +
                    c.Coordinator_FirstName + ','
                    + c.Coordinator_LastName + ',' +
                    c.id + '">' +
                    c.Coordinator_FirstName + ' ' +
                    c.Coordinator_LastName +
                '</option>';
           });
            $("#coordinator, #d_coordinator").html($lme_html);
            $("#coordinator, #d_coordinator").selectpicker("refresh");
        }
    }

    // FILTERING
    $("#county, #d_county").on("change", function() {
        $county = $(this).val();
        if (typeof $county === "object") {
            $county = $county.join("");
        }
        // if the county changes filter all sub-counties, clusters for that county
        $sub_counties = solar.sub_counties.filter(function(sub) {
            return sub.County === $county;
        });
        //
        $lmes = solar.lmes.filter(function (l) {
            return l.County === $county;
        });

         $coordinators = solar.coordinators.filter(function (l) {
            return l.County === $county;
        });

        $monitors = solar.monitors.filter(function (l) {
            return l.County === $county;
        });

        $groups = solar.groups.filter(function(sub) {
            return sub.County === $county;
        });
        //
        $wards = solar.wards.filter(function(sub) {
            return sub.County === $county;
        });

        $builders = solar.builders.filter(function (l) {
            return l.County === $county;
        });

        $builder_html = '';
        $builders.map(function (c) {
            $builder_html += 
            '<option data-cluster="' + c.Cluster +
                '" data-county="' + c.County +
                '" data-subcounty="' + c.SubCounty +
                '"' + 'value="' + c.StoveBuilder + '">' + c.StoveBuilder +
            '</option>';
       });

        $group_html = '';
       $groups.map(function (c) {
            $group_html += '<option value="' + c.SGroup + '">' + c.SGroup + '</option>';
       });

       $ward_html = '';
       $wards.map(function (c) {
            $ward_html += '<option value="' + c.Ward + '">' + c.Ward + '</option>';
       });

        $subcounty_html = '';
       $sub_counties.map(function (c) {
            $subcounty_html += '<option value="' + c.SubCounty + '">' + c.SubCounty + '</option>';
       });

       $lme_html = '';
       $lmes.map(function (c) {
            $lme_html += 
            '<option data-cluster="' + c.Cluster +
                '" data-county="' + c.County +
                '" data-subcounty="' + c.SubCounty +
                '"' + 'value="' +
                c.LME_FirstName + ','
                + c.LME_LastName + ',' +
                c.id + '">' +
                c.LME_FirstName + ' ' +
                c.LME_LastName +
            '</option>';
       });
        $coordinator_html = '';
       $coordinators.map(function (c) {
           $lme_html += 
            '<option data-cluster="' + c.Cluster +
                '" data-county="' + c.County +
                '" data-subcounty="' + c.SubCounty +
                '"' + 'value="' +
                c.LME_FirstName + ','
                + c.LME_LastName + ',' +
                c.id + '">' +
                c.LME_FirstName + ' ' +
                c.LME_LastName +
            '</option>';
       });

       $monitor_html = '';
        solar.monitors.map(function (c) {
            $monitor_html += 
            '<option data-cluster="' + c.Cluster +
                '" data-county="' + c.County +
                '" data-subcounty="' + c.SubCounty +
                '"' + 'value="' + c.StoveBuilder + '">' + c.StoveBuilder +
            '</option>';
       });

       /**
        * IDEALLY IF WE CAN'T MATCHING VALUES WE RESET THE DROPDOWN TO ITS FULL LENGTH BUT
        * QA THINKS THIS SHOULD BE BLANK SO WE TEMPORARILY COMMENT IT OUT
        */
        // if($monitors.length > 0) {
            $("#monitor, #d_monitor").html($monitor_html);
            $("#monitor, #d_monitor").selectpicker("refresh");
        // } else {
        //     resetMonitors();
        // }
       
        // if($sub_counties.length > 0) {
            $("#sub_county, #d_sub_county, #d_subcounty").html($subcounty_html);
            $("#sub_county, #d_sub_county, #d_subcounty").selectpicker("refresh");
        // } else {
        //     resetSubCounties();
        // }

        // if ($lmes.length) {
            $("#lme, #d_lme").html($lme_html);
            $("#lme, #d_lme").selectpicker("refresh");
        // } else {
        //     resetLmes();
        // }
        //  if ($coordinators.length) {
            $("#coordinator, #d_coordinator").html($coordinator_html);
            $("#coordinator, #d_coordinator").selectpicker("refresh");
        // } else {
        //     resetCoordinators();
        // }

        // if ($groups.length > 0) {
            $("#group").html($group_html);
            $("#group").selectpicker("refresh");
        // } else {
        //     resetGroups();
        // }

        // if ($wards.length > 0) {
            $("#ward").html($ward_html);
            $("#ward").selectpicker("refresh");
        // } else {
        //     resetWards();
        // }

        //  if($builders.length > 0) {
            $("#builder, #d_builder").html($builder_html);
            $("#builder, #d_builder").selectpicker("refresh");
        // } else {
        //     resetMonitors();
        // }
    });
    //
    $("#sub_county, #d_sub_county, #d_subcounty").on("change", function() {
        $sub_county = $(this).val();
        if (typeof $sub_county === "object") {
            $sub_county = $sub_county.join("");
        }
        //
        $lmes = solar.lmes.filter(function (l) {
            return l.SubCounty === $sub_county;
        });
        // 
         $coordinators = solar.coordinators.filter(function (l) {
            return l.SubCounty === $sub_county;
        });

        $monitors = solar.monitors.filter(function (l) {
            return l.SubCounty === $sub_county;
        });

          //
        $groups = solar.groups.filter(function(sub) {
            return sub.SubCounty === $sub_county;
        });
        //
        $wards = solar.wards.filter(function(sub) {
            return sub.SubCounty === $sub_county;
        });

        $builders = solar.builders.filter(function (l) {
            return l.SubCounty === $sub_county;
        });

        $builder_html = '';
        $builders.map(function (c) {
            $builder_html += 
            '<option data-cluster="' + c.Cluster +
                '" data-county="' + c.County +
                '" data-subcounty="' + c.SubCounty +
                '"' + 'value="' + c.StoveBuilder + '">' + c.StoveBuilder +
            '</option>';
       });

        $group_html = '';
       $groups.map(function (c) {
            $group_html += '<option value="' + c.SGroup + '">' + c.SGroup + '</option>';
       });

       $ward_html = '';
       $wards.map(function (c) {
            $ward_html += '<option value="' + c.Ward + '">' + c.Ward + '</option>';
       });

       $lme_html = '';
       $lmes.map(function (c) {
            $lme_html += 
            '<option data-cluster="' + c.Cluster +
                '" data-county="' + c.County +
                '" data-subcounty="' + c.SubCounty +
                '"' + 'value="' +
                c.LME_FirstName + ','
                + c.LME_LastName + ',' +
                c.id + '">' +
                c.LME_FirstName + ' ' +
                c.LME_LastName +
            '</option>';
       });
       $coordinator_html = '';
       $coordinators.map(function (c) {
           $lme_html += 
            '<option data-cluster="' + c.Cluster +
                '" data-county="' + c.County +
                '" data-subcounty="' + c.SubCounty +
                '"' + 'value="' +
                c.LME_FirstName + ','
                + c.LME_LastName + ',' +
                c.id + '">' +
                c.LME_FirstName + ' ' +
                c.LME_LastName +
            '</option>';
       });

        $monitor_html = '';
        solar.monitors.map(function (c) {
            $monitor_html += 
            '<option data-cluster="' + c.Cluster +
                '" data-county="' + c.County +
                '" data-subcounty="' + c.SubCounty +
                '"' + 'value="' + c.StoveBuilder + '">' + c.StoveBuilder +
            '</option>';
       });

        // if($monitors.length > 0) {
            $("#monitor, #d_monitor").html($monitor_html);
            $("#monitor, #d_monitor").selectpicker("refresh");
        // } else {
        //     resetMonitors();
        // }

        // if ($lmes.length) {
            $("#lme, #d_lme").html($lme_html);
            $("#lme, #d_lme").selectpicker("refresh");
        // } else {
        //     resetLmes();
        // }

        // if ($coordinators.length) {
            $("#coordinator, #d_coordinator").html($lme_html);
            $("#coordinator, #d_coordinator").selectpicker("refresh");
        // } else {
        //     resetCoordinators();
        // }

        // if ($groups.length > 0) {
            $("#group").html($group_html);
            $("#group").selectpicker("refresh");
        // } else {
        //     resetGroups();
        // }

        // if ($wards.length > 0) {
            $("#ward").html($ward_html);
            $("#ward").selectpicker("refresh");
        // } else {
        //     resetWards();
        // }

        //  if($builders.length > 0) {
            $("#builder, #d_builder").html($builder_html);
            $("#builder, #d_builder").selectpicker("refresh");
        // } else {
        //     resetMonitors();
        // }

    });
    //
    $("#cluster, #d_cluster").on("change", function() {
        $cluster = $(this).val();
        if (typeof $cluster === "object") {
            $cluster = $cluster.join("");
        }
        // if the county changes filter all sub-counties, clusters for that county
        $counties = solar.counties.filter(function(sub) {
            return sub.Cluster === $cluster;
        });
        //
        $sub_counties = solar.sub_counties.filter(function(sub) {
            return sub.Cluster === $cluster;
        });
        //
        $lmes = solar.lmes.filter(function (l) {
            return l.Cluster === $cluster;
        });
        $coordinators = solar.coordinators.filter(function (l) {
            return l.Cluster === $cluster;
        });
        $monitors = solar.monitors.filter(function (l) {
            return l.Cluster === $cluster;
        });

        //
        $groups = solar.groups.filter(function(sub) {
            return sub.Cluster === $cluster;
        });
        //
        $wards = solar.wards.filter(function(sub) {
            return sub.Cluster === $cluster;
        });

        $builders = solar.builders.filter(function (l) {
            return l.Cluster === $cluster;
        });

        $builder_html = '';
        $builders.map(function (c) {
            $builder_html += 
            '<option data-cluster="' + c.Cluster +
                '" data-county="' + c.County +
                '" data-subcounty="' + c.SubCounty +
                '"' + 'value="' + c.StoveBuilder + '">' + c.StoveBuilder +
            '</option>';
       });

       $county_html = '';
       $counties.map(function (c) {
            $county_html += '<option value="' + c.County + '">' + c.County + '</option>';
       });

       $sub_html = '';
       $sub_counties.map(function (c) {
            $sub_html += '<option value="' + c.SubCounty + '">' + c.SubCounty + '</option>';
       });

        $lme_html = '';
       $lmes.map(function (c) {
           $lme_html += 
            '<option data-cluster="' + c.Cluster +
                '" data-county="' + c.County +
                '" data-subcounty="' + c.SubCounty +
                '"' + 'value="' +
                c.LME_FirstName + ','
                + c.LME_LastName + ',' +
                c.id + '">' +
                c.LME_FirstName + ' ' +
                c.LME_LastName +
            '</option>';
       });

        $coordinator_html = '';
       $coordinators.map(function (c) {
           $lme_html += 
            '<option data-cluster="' + c.Cluster +
                '" data-county="' + c.County +
                '" data-subcounty="' + c.SubCounty +
                '"' + 'value="' +
                c.LME_FirstName + ','
                + c.LME_LastName + ',' +
                c.id + '">' +
                c.LME_FirstName + ' ' +
                c.LME_LastName +
            '</option>';
       });

        $monitor_html = '';
        solar.monitors.map(function (c) {
            $monitor_html += 
            '<option data-cluster="' + c.Cluster +
                '" data-county="' + c.County +
                '" data-subcounty="' + c.SubCounty +
                '"' + 'value="' + c.StoveBuilder + '">' + c.StoveBuilder +
            '</option>';
       });

        $group_html = '';
       $groups.map(function (c) {
            $group_html += '<option value="' + c.SGroup + '">' + c.SGroup + '</option>';
       });

       $ward_html = '';
       $wards.map(function (c) {
            $ward_html += '<option value="' + c.Ward + '">' + c.Ward + '</option>';
       });

    //    if ($counties.length > 0) {
            $("#county, #d_county").html($county_html);
            $("#county, #d_county").selectpicker("refresh");
        // } else {
        //     resetCounties();
        // }
       
        // if($sub_counties.length > 0) {
            $("#sub_county, #d_sub_county").html($sub_html);
            $("#sub_county, #d_sub_county").selectpicker("refresh");
        // } else {
        //     resetSubCounties();
        // }

        // if ($lmes.length) {
            $("#lme, #d_lme").html($lme_html);
            $("#lme, #d_lme").selectpicker("refresh");
        // } else {
        //     resetLmes();
        // }

        // if ($coordinators.length) {
            $("#coordinator, #d_coordinator").html($lme_html);
            $("#coordinator, #d_coordinator").selectpicker("refresh");
        // } else {
        //     resetCoordinators();
        // }

        //  if($monitors.length > 0) {
            $("#monitor, #d_monitor").html($monitor_html);
            $("#monitor, #d_monitor").selectpicker("refresh");
        // } else {
        //     resetMonitors();
        // }

        // if ($groups.length > 0) {
            $("#group").html($group_html);
            $("#group").selectpicker("refresh");
        // } else {
        //     resetGroups();
        // }

        // if ($wards.length > 0) {
            $("#ward").html($ward_html);
            $("#ward").selectpicker("refresh");
        // } else {
        //     resetWards();
        // }

        // if ($groups.length > 0) {
            $("#group").html($group_html);
            $("#group").selectpicker("refresh");
        // } else {
        //     resetGroups();
        // }

        // if ($wards.length > 0) {
            $("#ward").html($ward_html);
            $("#ward").selectpicker("refresh");
        // } else {
        //     resetWards();
        // }

        //  if($builders.length > 0) {
            $("#builder, #d_builder").html($builder_html);
            $("#builder, #d_builder").selectpicker("refresh");
        // } else {
        //     resetMonitors();
        // }

    });

     //
    $("#lme, #d_lme, #d_coordinator").on("change", function() {
        var selected = $(this).find("option:selected");
        $cluster = selected.attr('data-cluster');
        $county = selected.attr('data-county');
        $sub_county = selected.attr('data-subcounty');

        $builders = solar.builders.filter(function (l) {
            return l.SubCounty === $sub_county;
        });

       $builder_html = '';
        $builders.map(function (c) {
            $builder_html += 
            '<option data-cluster="' + c.Cluster +
                '" data-county="' + c.County +
                '" data-subcounty="' + c.SubCounty +
                '"' + 'value="' + c.StoveBuilder + '">' + c.StoveBuilder +
            '</option>';
       });

        //  if($builders.length > 0) {
            $("#builder, #d_builder").html($builder_html);
            $("#builder, #d_builder").selectpicker("refresh");
        // } else {
        //     resetMonitors();
        // }

    });
    // monitor
    $("#monitor").on("change", function() {
        var selected = $(this).find("option:selected");
        $cluster = selected.attr('data-cluster');
        $county = selected.attr('data-county');
        $sub_county = selected.attr('data-subcounty');
        $group = selected.attr('data-group');
        $ward = selected.attr('data-ward');
        //
        $groups = solar.groups.filter(function(sub) {
            return sub.County === $county;
        });
        //
        $wards = solar.wards.filter(function(sub) {
            return sub.County === $county;
        });
        //
        $builders = solar.builders.filter(function (l) {
            return l.SubCounty === $sub_county;
        });

        $builder_html = '';
        $builders.map(function (c) {
            $builder_html += 
            '<option data-cluster="' + c.Cluster +
                '" data-county="' + c.County +
                '" data-subcounty="' + c.SubCounty +
                '"' + 'value="' + c.StoveBuilder + '">' + c.StoveBuilder +
            '</option>';
       });

       $group_html = '';
       $groups.map(function (c) {
            $group_html += '<option value="' + c.SGroup + '">' + c.SGroup + '</option>';
       });

       $ward_html = '';
       $wards.map(function (c) {
            $ward_html += '<option value="' + c.Ward + '">' + c.Ward + '</option>';
       });

        // if ($groups.length > 0) {
            $("#group").html($group_html);
            $("#group").selectpicker("refresh");
        // } else {
        //     resetGroups();
        // }

        // if ($wards.length > 0) {
            $("#ward").html($ward_html);
            $("#ward").selectpicker("refresh");
        // } else {
        //     resetWards();
        // }

        // if($builders.length > 0) {
            $("#builder, #d_builder").html($builder_html);
            $("#builder, #d_builder").selectpicker("refresh");
        // } else {
        //     resetMonitors();
        // }
    });
    //
    $("#builder").on("change", function() {
        var selected = $(this).find("option:selected");
        $cluster = selected.attr('data-cluster');
        $county = selected.attr('data-county');
        $sub_county = selected.attr('data-subcounty');
        $group = selected.attr('data-group');
        $ward = selected.attr('data-ward');
        $monitor = selected.attr('data-monitor');
        //
        $groups = solar.groups.filter(function(sub) {
            return sub.County === $county;
        });
        //
        $wards = solar.wards.filter(function(sub) {
            return sub.County === $county;
        });
        $monitors = solar.monitors.filter(function (l) {
            return l.Monitor === $monitor;
        });

       $group_html = '';
       $groups.map(function (c) {
            $group_html += '<option value="' + c.SGroup + '">' + c.SGroup + '</option>';
       });

       $ward_html = '';
       $wards.map(function (c) {
            $ward_html += '<option value="' + c.Ward + '">' + c.Ward + '</option>';
       });

       $monitor_html = '';
        $monitors.map(function (c) {
            $monitor_html += 
            '<option data-cluster="' + c.Cluster +
                '" data-county="' + c.County +
                '" data-subcounty="' + c.SubCounty +
                '"' + 'value="' + c.StoveBuilder + '">' + c.StoveBuilder +
            '</option>';
       });

        // if ($groups.length > 0) {
            $("#group").html($group_html);
            $("#group").selectpicker("refresh");
        // } else {
        //     resetGroups();
        // }

        // if ($wards.length > 0) {
            $("#ward").html($ward_html);
            $("#ward").selectpicker("refresh");
        // } else {
        //     resetWards();
        // }

        // if($monitors.length > 0) {
            $("#monitor, #d_monitor").html($monitor_html);
            $("#monitor, #d_monitor").selectpicker("refresh");
        // } else {
        //     resetMonitors();
        // }
    });
    // wards
     //
    $("#ward, #d_ward").on("change", function() {
        var selected = $(this).find("option:selected");
        $cluster = selected.attr('data-cluster');
        $county = selected.attr('data-county');
        $sub_county = selected.attr('data-subcounty');
        $group = selected.attr('data-group');
        $ward = $(this).val();
        //
        $monitors = solar.monitors.filter(function (l) {
            return l.Ward === $ward;
        });

        $groups = solar.groups.filter(function(sub) {
            return sub.County === $county;
        });
        $builders = solar.builders.filter(function (l) {
            return l.Ward === $ward;
        });

        $builder_html = '';
        $builders.map(function (c) {
            $builder_html += 
            '<option data-cluster="' + c.Cluster +
                '" data-county="' + c.County +
                '" data-subcounty="' + c.SubCounty +
                '"' + 'value="' + c.StoveBuilder + '">' + c.StoveBuilder +
            '</option>';
       });

        $monitor_html = '';
        solar.monitors.map(function (c) {
            $monitor_html += 
            '<option data-cluster="' + c.Cluster +
                '" data-county="' + c.County +
                '" data-subcounty="' + c.SubCounty +
                '"' + 'value="' + c.StoveBuilder + '">' + c.StoveBuilder +
            '</option>';
       });

        $group_html = '';
       $groups.map(function (c) {
            $group_html += '<option value="' + c.SGroup + '">' + c.SGroup + '</option>';
       });

        //  if($monitors.length > 0) {
            $("#monitor, #d_monitor").html($monitor_html);
            $("#monitor, #d_monitor").selectpicker("refresh");
        // } else {
        //     resetMonitors();
        // }

        // if ($groups.length > 0) {
            $("#group").html($group_html);
            $("#group").selectpicker("refresh");
        // } else {
        //     resetGroups();
        // }

        // if($builders.length > 0) {
            $("#builder, #d_builder").html($builder_html);
            $("#builder, #d_builder").selectpicker("refresh");
        // } else {
        //     resetMonitors();
        // }
    });
    //
    // groups
    $("#group, #d_group").on("change", function() {
        var selected = $(this).find("option:selected");
        $cluster = selected.attr('data-cluster');
        $county = selected.attr('data-county');
        $sub_county = selected.attr('data-subcounty');
        $ward = selected.attr('data-ward');
        $group = $(this).val();

        $monitors = solar.monitors.filter(function (l) {
            return l.SGroup === $group;
        });

         $builders = solar.builders.filter(function (l) {
            return l.SGroup === $group;
        });

        $builder_html = '';
        $builders.map(function (c) {
            $builder_html += 
            '<option data-cluster="' + c.Cluster +
                '" data-county="' + c.County +
                '" data-subcounty="' + c.SubCounty +
                '"' + 'value="' + c.StoveBuilder + '">' + c.StoveBuilder +
            '</option>';
       });

        $monitor_html = '';
        solar.monitors.map(function (c) {
            $monitor_html += 
            '<option data-cluster="' + c.Cluster +
                '" data-county="' + c.County +
                '" data-subcounty="' + c.SubCounty +
                '"' + 'value="' + c.StoveBuilder + '">' + c.StoveBuilder +
            '</option>';
       });

        //  if($monitors.length > 0) {
            $("#monitor, #d_monitor").html($monitor_html);
            $("#monitor, #d_monitor").selectpicker("refresh");
        // } else {
        //     resetMonitors();
        // }

        // if($builders.length > 0) {
            $("#builder, #d_builder").html($builder_html);
            $("#builder, #d_builder").selectpicker("refresh");
        // } else {
        //     resetMonitors();
        // }

    });

});
