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
         * Display / Hide the search box on larger screens
         */
        document.getElementById('search-icon-link').onclick = function() {
            document.getElementById('search-form').style.display = 'block';
        }

        document.getElementById('search-close').onclick = function() {
            document.getElementById('search-form').style.display = 'none';
        }

    }
)();
