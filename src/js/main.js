( function() {
        var container, button, menu, links, subMenus;

        container = document.getElementById( 'site-navigation' );
        if ( ! container ) {
            return;
        }

        button = container.getElementsByTagName( 'button' )[0];
        if ( 'undefined' === typeof button ) {
            return;
        }

        menu = container.getElementsByTagName( 'ul' )[0];

        // Hide menu toggle button if menu is empty and return early.
        if ( 'undefined' === typeof menu ) {
            button.style.display = 'none';
            return;
        }

        menu.setAttribute( 'aria-expanded', 'false' );
        if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
            menu.className += ' nav-menu';
        }

        button.onclick = function(event) {
            if ( -1 !== container.className.indexOf( 'toggled' ) ) {
                container.className = container.className.replace( ' toggled', '' );
                button.setAttribute( 'aria-expanded', 'false' );
                menu.setAttribute( 'aria-expanded', 'false' );
            } else {
                container.className += ' toggled';
                button.setAttribute( 'aria-expanded', 'true' );
                menu.setAttribute( 'aria-expanded', 'true' );
            }

            event.stopPropagation();
        };

        document.addEventListener( 'click', closeMenu);
        document.addEventListener( 'touchstart', closeMenu);

        function closeMenu(event)
        {
            if( event.target === container || isChild( event.target, container )) {
                return false;
            }

            if ( -1 !== container.className.indexOf( 'toggled' ) ) {
                container.className = container.className.replace('toggled', '');
                button.setAttribute('aria-expanded', 'false');
                menu.setAttribute('aria-expanded', 'false');
            }
        }

        function isChild(node, parent)
        {
            while ( node.parentNode !== null ) {
                if ( node === parent ) {
                    return true;
                }

                node = node.parentNode;
            }

            return false;
        }

        // Get all the link elements within the menu.
        links    = menu.getElementsByTagName( 'a' );
        subMenus = menu.getElementsByTagName( 'ul' );

        // Set menu items with submenus to aria-haspopup="true".
        for ( var i = 0, len = subMenus.length; i < len; i++ ) {
            subMenus[i].parentNode.setAttribute( 'aria-haspopup', 'true' );
        }

        // Each time a menu link is focused or blurred, toggle focus.
        for ( i = 0, len = links.length; i < len; i++ ) {
            links[i].addEventListener( 'focus', toggleFocus, true );
            links[i].addEventListener( 'blur', toggleFocus, true );
        }

        /**
         * Sets or removes .focus class on an element.
         */
        function toggleFocus() {
            var self = this;

            // Move up through the ancestors of the current link until we hit .nav-menu.
            while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

                // On li elements toggle the class .focus.
                if ( 'li' === self.tagName.toLowerCase() ) {
                    if ( -1 !== self.className.indexOf( 'focus' ) ) {
                        self.className = self.className.replace( ' focus', '' );
                    } else {
                        self.className += ' focus';
                    }
                }

                self = self.parentElement;
            }
        }


        /**
         * Everything to run once the DOM is loaded.
         */
        document.addEventListener('DOMContentLoaded', function() {

            var isMobile = false;

            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                document.getElementsByTagName( 'body' )[0].classList.add( 'has-touch' );
                isMobile = true;
            }

            /**
             * Handle differeing functionality for mobile vs non-mobile devices.
             */
            (function() {
                var masthead = document.querySelector( '.home #masthead' );
                var introVideo = document.getElementById('intro-video');
                var bgElements = document.querySelectorAll('.home .row');

                if ( isMobile ) {
                    if (masthead) {
                        masthead.style.background = "url(" + template_directory_uri + "/images/backs-on-air.jpg) no-repeat 60% center";
                        masthead.style.backgroundSize = 'cover';
                    }

                    if (introVideo) {
                        introVideo.remove();
                    }
                } else {
                    if ( bgElements ) {
                        for ( var i = 0; i < bgElements.length; ++i ) {
                            bgElements[i].style.backgroundAttachment = 'fixed';
                        }
                    }

                    // No backgrond image on non-mobile devices
                    if( masthead ) {
                        masthead.style.background = 'none';
                    }

                    if (introVideo) {
                        introVideo.setAttribute('poster', template_directory_uri + "/images/rchn-cover-poster.jpg")
                    }
                }
            })();

            /**
             * Display / Hide the search box on larger screens
             */
            document.getElementById('search-icon-link').onclick = function () {
                document.getElementById('search-form').style.display = 'block';
            }

            document.getElementById('search-close').onclick = function () {
                document.getElementById('search-form').style.display = 'none';
            }


            /**
             * Update the height of sponsor banners on home page.
             */
            updateSponsorBannerHeight();

            window.addEventListener('resize', function() {
                updateSponsorBannerHeight();
            });

            function updateSponsorBannerHeight() {
                var sliderElements = document.querySelectorAll('.coin-slider > div');

                for(var i = 0; i < sliderElements.length; ++i) {
                    sliderElements[i].style.height = sliderElements[i].offsetWidth * .2238 + 'px';
                }
            }


            /**
             * Easter egg inverted
             */
            var trigger = document.getElementById('inverted-toggle');

            trigger.addEventListener('click', function() {
                document.querySelector('body').classList.toggle('inverted');
            });


            /**
             * Update search form field to search tags or categories as requested by user.
             */
            (function() {
                var forms = document.getElementsByClassName('search-form');

                for(var i = 0; i < forms.length; ++i) {

                    forms[i].addEventListener('submit', function() {
                        var selects = this.getElementsByTagName('select');
                        var search_select = selects[0];
                        var selected_values = this.getElementsByClassName('selected_value');
                        var selected_value = selected_values[0];
                        var search_type = '';
                        var search_value = search_select[search_select.selectedIndex].value;

                        switch(search_value) {
                            case 'RCHN':
                            case 'review':
                                search_type = 'tag';
                                break;
                            case 'tech-tips':
                                search_type = 'category_name';
                                break;
                        }

                        selected_value.setAttribute('name', search_type);
                        selected_value.setAttribute('value', search_value);
                    });
                }
            })();
        });


        /*
         * Make video embeds responsive.
         */
        !(function() {
            var fluid_vids = {
                fluid_videos: function () {
                    var iframes = document.getElementsByTagName('iframe');
                    for (var i = 0; i < iframes.length; i++) {
                        var iframe = iframes[i],
                            players = /www.youtube.com|player.vimeo.com/;
                        if (iframe.src.search(players) > 0) {
                            var videoRatio = (iframe.height / iframe.width) * 100;
                            iframe.style.position = 'absolute';
                            iframe.style.top = '0';
                            iframe.style.left = '0';
                            iframe.width = '100%';
                            iframe.height = '100%';
                            var wrap = document.createElement('div');
                            wrap.className = 'fluid-vids';
                            wrap.style.width = '100%';
                            wrap.style.position = 'relative';
                            wrap.style.paddingTop = videoRatio + '%';
                            var iframeParent = iframe.parentNode;
                            iframeParent.insertBefore(wrap, iframe);
                            wrap.appendChild(iframe);
                        }
                    }
                }
            };
            fluid_vids.fluid_videos();
        })();
    }
)();
