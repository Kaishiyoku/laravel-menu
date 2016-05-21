
(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="index.html">Kaishiyoku</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Kaishiyoku_Menu" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Kaishiyoku/Menu.html">Menu</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Kaishiyoku_Menu_Data" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Kaishiyoku/Menu/Data.html">Data</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Kaishiyoku_Menu_Data_Content" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kaishiyoku/Menu/Data/Content.html">Content</a>                    </div>                </li>                            <li data-name="class:Kaishiyoku_Menu_Data_Dropdown" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kaishiyoku/Menu/Data/Dropdown.html">Dropdown</a>                    </div>                </li>                            <li data-name="class:Kaishiyoku_Menu_Data_DropdownDivider" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kaishiyoku/Menu/Data/DropdownDivider.html">DropdownDivider</a>                    </div>                </li>                            <li data-name="class:Kaishiyoku_Menu_Data_DropdownHeader" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kaishiyoku/Menu/Data/DropdownHeader.html">DropdownHeader</a>                    </div>                </li>                            <li data-name="class:Kaishiyoku_Menu_Data_Link" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kaishiyoku/Menu/Data/Link.html">Link</a>                    </div>                </li>                            <li data-name="class:Kaishiyoku_Menu_Data_MenuContainer" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kaishiyoku/Menu/Data/MenuContainer.html">MenuContainer</a>                    </div>                </li>                            <li data-name="class:Kaishiyoku_Menu_Data_MenuEntry" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kaishiyoku/Menu/Data/MenuEntry.html">MenuEntry</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Kaishiyoku_Menu_Exceptions" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Kaishiyoku/Menu/Exceptions.html">Exceptions</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Kaishiyoku_Menu_Exceptions_MenuExistsException" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kaishiyoku/Menu/Exceptions/MenuExistsException.html">MenuExistsException</a>                    </div>                </li>                            <li data-name="class:Kaishiyoku_Menu_Exceptions_MenuNotFoundException" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kaishiyoku/Menu/Exceptions/MenuNotFoundException.html">MenuNotFoundException</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Kaishiyoku_Menu_Facades" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Kaishiyoku/Menu/Facades.html">Facades</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Kaishiyoku_Menu_Facades_Menu" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kaishiyoku/Menu/Facades/Menu.html">Menu</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Kaishiyoku_Menu_Menu" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Kaishiyoku/Menu/Menu.html">Menu</a>                    </div>                </li>                            <li data-name="class:Kaishiyoku_Menu_MenuHelper" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Kaishiyoku/Menu/MenuHelper.html">MenuHelper</a>                    </div>                </li>                            <li data-name="class:Kaishiyoku_Menu_MenuServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Kaishiyoku/Menu/MenuServiceProvider.html">MenuServiceProvider</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "Kaishiyoku.html", "name": "Kaishiyoku", "doc": "Namespace Kaishiyoku"},{"type": "Namespace", "link": "Kaishiyoku/Menu.html", "name": "Kaishiyoku\\Menu", "doc": "Namespace Kaishiyoku\\Menu"},{"type": "Namespace", "link": "Kaishiyoku/Menu/Data.html", "name": "Kaishiyoku\\Menu\\Data", "doc": "Namespace Kaishiyoku\\Menu\\Data"},{"type": "Namespace", "link": "Kaishiyoku/Menu/Exceptions.html", "name": "Kaishiyoku\\Menu\\Exceptions", "doc": "Namespace Kaishiyoku\\Menu\\Exceptions"},{"type": "Namespace", "link": "Kaishiyoku/Menu/Facades.html", "name": "Kaishiyoku\\Menu\\Facades", "doc": "Namespace Kaishiyoku\\Menu\\Facades"},
            
            {"type": "Class", "fromName": "Kaishiyoku\\Menu\\Data", "fromLink": "Kaishiyoku/Menu/Data.html", "link": "Kaishiyoku/Menu/Data/Content.html", "name": "Kaishiyoku\\Menu\\Data\\Content", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\Content", "fromLink": "Kaishiyoku/Menu/Data/Content.html", "link": "Kaishiyoku/Menu/Data/Content.html#method___construct", "name": "Kaishiyoku\\Menu\\Data\\Content::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\Content", "fromLink": "Kaishiyoku/Menu/Data/Content.html", "link": "Kaishiyoku/Menu/Data/Content.html#method_render", "name": "Kaishiyoku\\Menu\\Data\\Content::render", "doc": "&quot;Get the evaluated contents of the object.&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\Content", "fromLink": "Kaishiyoku/Menu/Data/Content.html", "link": "Kaishiyoku/Menu/Data/Content.html#method_isVisible", "name": "Kaishiyoku\\Menu\\Data\\Content::isVisible", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Kaishiyoku\\Menu\\Data", "fromLink": "Kaishiyoku/Menu/Data.html", "link": "Kaishiyoku/Menu/Data/Dropdown.html", "name": "Kaishiyoku\\Menu\\Data\\Dropdown", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\Dropdown", "fromLink": "Kaishiyoku/Menu/Data/Dropdown.html", "link": "Kaishiyoku/Menu/Data/Dropdown.html#method___construct", "name": "Kaishiyoku\\Menu\\Data\\Dropdown::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\Dropdown", "fromLink": "Kaishiyoku/Menu/Data/Dropdown.html", "link": "Kaishiyoku/Menu/Data/Dropdown.html#method_render", "name": "Kaishiyoku\\Menu\\Data\\Dropdown::render", "doc": "&quot;Get the evaluated contents of the object.&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\Dropdown", "fromLink": "Kaishiyoku/Menu/Data/Dropdown.html", "link": "Kaishiyoku/Menu/Data/Dropdown.html#method_getEntries", "name": "Kaishiyoku\\Menu\\Data\\Dropdown::getEntries", "doc": "&quot;Get all items of the dropdown.&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\Dropdown", "fromLink": "Kaishiyoku/Menu/Data/Dropdown.html", "link": "Kaishiyoku/Menu/Data/Dropdown.html#method_isVisible", "name": "Kaishiyoku\\Menu\\Data\\Dropdown::isVisible", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Kaishiyoku\\Menu\\Data", "fromLink": "Kaishiyoku/Menu/Data.html", "link": "Kaishiyoku/Menu/Data/DropdownDivider.html", "name": "Kaishiyoku\\Menu\\Data\\DropdownDivider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\DropdownDivider", "fromLink": "Kaishiyoku/Menu/Data/DropdownDivider.html", "link": "Kaishiyoku/Menu/Data/DropdownDivider.html#method___construct", "name": "Kaishiyoku\\Menu\\Data\\DropdownDivider::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\DropdownDivider", "fromLink": "Kaishiyoku/Menu/Data/DropdownDivider.html", "link": "Kaishiyoku/Menu/Data/DropdownDivider.html#method_render", "name": "Kaishiyoku\\Menu\\Data\\DropdownDivider::render", "doc": "&quot;Get the evaluated contents of the object.&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\DropdownDivider", "fromLink": "Kaishiyoku/Menu/Data/DropdownDivider.html", "link": "Kaishiyoku/Menu/Data/DropdownDivider.html#method_isVisible", "name": "Kaishiyoku\\Menu\\Data\\DropdownDivider::isVisible", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Kaishiyoku\\Menu\\Data", "fromLink": "Kaishiyoku/Menu/Data.html", "link": "Kaishiyoku/Menu/Data/DropdownHeader.html", "name": "Kaishiyoku\\Menu\\Data\\DropdownHeader", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\DropdownHeader", "fromLink": "Kaishiyoku/Menu/Data/DropdownHeader.html", "link": "Kaishiyoku/Menu/Data/DropdownHeader.html#method___construct", "name": "Kaishiyoku\\Menu\\Data\\DropdownHeader::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\DropdownHeader", "fromLink": "Kaishiyoku/Menu/Data/DropdownHeader.html", "link": "Kaishiyoku/Menu/Data/DropdownHeader.html#method_render", "name": "Kaishiyoku\\Menu\\Data\\DropdownHeader::render", "doc": "&quot;Get the evaluated contents of the object.&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\DropdownHeader", "fromLink": "Kaishiyoku/Menu/Data/DropdownHeader.html", "link": "Kaishiyoku/Menu/Data/DropdownHeader.html#method_isVisible", "name": "Kaishiyoku\\Menu\\Data\\DropdownHeader::isVisible", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Kaishiyoku\\Menu\\Data", "fromLink": "Kaishiyoku/Menu/Data.html", "link": "Kaishiyoku/Menu/Data/Link.html", "name": "Kaishiyoku\\Menu\\Data\\Link", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\Link", "fromLink": "Kaishiyoku/Menu/Data/Link.html", "link": "Kaishiyoku/Menu/Data/Link.html#method___construct", "name": "Kaishiyoku\\Menu\\Data\\Link::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\Link", "fromLink": "Kaishiyoku/Menu/Data/Link.html", "link": "Kaishiyoku/Menu/Data/Link.html#method_render", "name": "Kaishiyoku\\Menu\\Data\\Link::render", "doc": "&quot;Get the evaluated contents of the object.&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\Link", "fromLink": "Kaishiyoku/Menu/Data/Link.html", "link": "Kaishiyoku/Menu/Data/Link.html#method_getName", "name": "Kaishiyoku\\Menu\\Data\\Link::getName", "doc": "&quot;Get the link&#039;s route name.&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\Link", "fromLink": "Kaishiyoku/Menu/Data/Link.html", "link": "Kaishiyoku/Menu/Data/Link.html#method_getAdditionalRouteNames", "name": "Kaishiyoku\\Menu\\Data\\Link::getAdditionalRouteNames", "doc": "&quot;Get additional route names.&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\Link", "fromLink": "Kaishiyoku/Menu/Data/Link.html", "link": "Kaishiyoku/Menu/Data/Link.html#method_isVisible", "name": "Kaishiyoku\\Menu\\Data\\Link::isVisible", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Kaishiyoku\\Menu\\Data", "fromLink": "Kaishiyoku/Menu/Data.html", "link": "Kaishiyoku/Menu/Data/MenuContainer.html", "name": "Kaishiyoku\\Menu\\Data\\MenuContainer", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\MenuContainer", "fromLink": "Kaishiyoku/Menu/Data/MenuContainer.html", "link": "Kaishiyoku/Menu/Data/MenuContainer.html#method___construct", "name": "Kaishiyoku\\Menu\\Data\\MenuContainer::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\MenuContainer", "fromLink": "Kaishiyoku/Menu/Data/MenuContainer.html", "link": "Kaishiyoku/Menu/Data/MenuContainer.html#method_render", "name": "Kaishiyoku\\Menu\\Data\\MenuContainer::render", "doc": "&quot;Get the evaluated contents of the object.&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\MenuContainer", "fromLink": "Kaishiyoku/Menu/Data/MenuContainer.html", "link": "Kaishiyoku/Menu/Data/MenuContainer.html#method_getName", "name": "Kaishiyoku\\Menu\\Data\\MenuContainer::getName", "doc": "&quot;Get the name of the menu container.&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\MenuContainer", "fromLink": "Kaishiyoku/Menu/Data/MenuContainer.html", "link": "Kaishiyoku/Menu/Data/MenuContainer.html#method_isVisible", "name": "Kaishiyoku\\Menu\\Data\\MenuContainer::isVisible", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Kaishiyoku\\Menu\\Data", "fromLink": "Kaishiyoku/Menu/Data.html", "link": "Kaishiyoku/Menu/Data/MenuEntry.html", "name": "Kaishiyoku\\Menu\\Data\\MenuEntry", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\MenuEntry", "fromLink": "Kaishiyoku/Menu/Data/MenuEntry.html", "link": "Kaishiyoku/Menu/Data/MenuEntry.html#method_render", "name": "Kaishiyoku\\Menu\\Data\\MenuEntry::render", "doc": "&quot;Get the evaluated contents of the object.&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Data\\MenuEntry", "fromLink": "Kaishiyoku/Menu/Data/MenuEntry.html", "link": "Kaishiyoku/Menu/Data/MenuEntry.html#method_isVisible", "name": "Kaishiyoku\\Menu\\Data\\MenuEntry::isVisible", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Kaishiyoku\\Menu\\Exceptions", "fromLink": "Kaishiyoku/Menu/Exceptions.html", "link": "Kaishiyoku/Menu/Exceptions/MenuExistsException.html", "name": "Kaishiyoku\\Menu\\Exceptions\\MenuExistsException", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Exceptions\\MenuExistsException", "fromLink": "Kaishiyoku/Menu/Exceptions/MenuExistsException.html", "link": "Kaishiyoku/Menu/Exceptions/MenuExistsException.html#method___construct", "name": "Kaishiyoku\\Menu\\Exceptions\\MenuExistsException::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Exceptions\\MenuExistsException", "fromLink": "Kaishiyoku/Menu/Exceptions/MenuExistsException.html", "link": "Kaishiyoku/Menu/Exceptions/MenuExistsException.html#method_getName", "name": "Kaishiyoku\\Menu\\Exceptions\\MenuExistsException::getName", "doc": "&quot;Get the menu name.&quot;"},
            
            {"type": "Class", "fromName": "Kaishiyoku\\Menu\\Exceptions", "fromLink": "Kaishiyoku/Menu/Exceptions.html", "link": "Kaishiyoku/Menu/Exceptions/MenuNotFoundException.html", "name": "Kaishiyoku\\Menu\\Exceptions\\MenuNotFoundException", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Exceptions\\MenuNotFoundException", "fromLink": "Kaishiyoku/Menu/Exceptions/MenuNotFoundException.html", "link": "Kaishiyoku/Menu/Exceptions/MenuNotFoundException.html#method___construct", "name": "Kaishiyoku\\Menu\\Exceptions\\MenuNotFoundException::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Exceptions\\MenuNotFoundException", "fromLink": "Kaishiyoku/Menu/Exceptions/MenuNotFoundException.html", "link": "Kaishiyoku/Menu/Exceptions/MenuNotFoundException.html#method_getName", "name": "Kaishiyoku\\Menu\\Exceptions\\MenuNotFoundException::getName", "doc": "&quot;Get the menu name.&quot;"},
            
            {"type": "Class", "fromName": "Kaishiyoku\\Menu\\Facades", "fromLink": "Kaishiyoku/Menu/Facades.html", "link": "Kaishiyoku/Menu/Facades/Menu.html", "name": "Kaishiyoku\\Menu\\Facades\\Menu", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "Kaishiyoku\\Menu", "fromLink": "Kaishiyoku/Menu.html", "link": "Kaishiyoku/Menu/Menu.html", "name": "Kaishiyoku\\Menu\\Menu", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Menu", "fromLink": "Kaishiyoku/Menu/Menu.html", "link": "Kaishiyoku/Menu/Menu.html#method___construct", "name": "Kaishiyoku\\Menu\\Menu::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Menu", "fromLink": "Kaishiyoku/Menu/Menu.html", "link": "Kaishiyoku/Menu/Menu.html#method_add", "name": "Kaishiyoku\\Menu\\Menu::add", "doc": "&quot;Adds a new menu container.&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Menu", "fromLink": "Kaishiyoku/Menu/Menu.html", "link": "Kaishiyoku/Menu/Menu.html#method_addDefault", "name": "Kaishiyoku\\Menu\\Menu::addDefault", "doc": "&quot;Adds a new menu container under the default name.&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Menu", "fromLink": "Kaishiyoku/Menu/Menu.html", "link": "Kaishiyoku/Menu/Menu.html#method_link", "name": "Kaishiyoku\\Menu\\Menu::link", "doc": "&quot;Returns a new html anchor.&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Menu", "fromLink": "Kaishiyoku/Menu/Menu.html", "link": "Kaishiyoku/Menu/Menu.html#method_dropdown", "name": "Kaishiyoku\\Menu\\Menu::dropdown", "doc": "&quot;Returns a new html ul-like dropdown menu with sub-elements.&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Menu", "fromLink": "Kaishiyoku/Menu/Menu.html", "link": "Kaishiyoku/Menu/Menu.html#method_dropdownDivider", "name": "Kaishiyoku\\Menu\\Menu::dropdownDivider", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Menu", "fromLink": "Kaishiyoku/Menu/Menu.html", "link": "Kaishiyoku/Menu/Menu.html#method_dropdownHeader", "name": "Kaishiyoku\\Menu\\Menu::dropdownHeader", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Menu", "fromLink": "Kaishiyoku/Menu/Menu.html", "link": "Kaishiyoku/Menu/Menu.html#method_content", "name": "Kaishiyoku\\Menu\\Menu::content", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\Menu", "fromLink": "Kaishiyoku/Menu/Menu.html", "link": "Kaishiyoku/Menu/Menu.html#method_render", "name": "Kaishiyoku\\Menu\\Menu::render", "doc": "&quot;Get the evaluated contents of the specified menu container.&quot;"},
            
            {"type": "Class", "fromName": "Kaishiyoku\\Menu", "fromLink": "Kaishiyoku/Menu.html", "link": "Kaishiyoku/Menu/MenuHelper.html", "name": "Kaishiyoku\\Menu\\MenuHelper", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kaishiyoku\\Menu\\MenuHelper", "fromLink": "Kaishiyoku/Menu/MenuHelper.html", "link": "Kaishiyoku/Menu/MenuHelper.html#method_isCurrentRoute", "name": "Kaishiyoku\\Menu\\MenuHelper::isCurrentRoute", "doc": "&quot;Checks if the given route name is the current one.&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\MenuHelper", "fromLink": "Kaishiyoku/Menu/MenuHelper.html", "link": "Kaishiyoku/Menu/MenuHelper.html#method_purifyHtml", "name": "Kaishiyoku\\Menu\\MenuHelper::purifyHtml", "doc": "&quot;Purifies HTML to help preventing XSS.&quot;"},
            
            {"type": "Class", "fromName": "Kaishiyoku\\Menu", "fromLink": "Kaishiyoku/Menu.html", "link": "Kaishiyoku/Menu/MenuServiceProvider.html", "name": "Kaishiyoku\\Menu\\MenuServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Kaishiyoku\\Menu\\MenuServiceProvider", "fromLink": "Kaishiyoku/Menu/MenuServiceProvider.html", "link": "Kaishiyoku/Menu/MenuServiceProvider.html#method_boot", "name": "Kaishiyoku\\Menu\\MenuServiceProvider::boot", "doc": "&quot;Bootstrap the application events.&quot;"},
                    {"type": "Method", "fromName": "Kaishiyoku\\Menu\\MenuServiceProvider", "fromLink": "Kaishiyoku/Menu/MenuServiceProvider.html", "link": "Kaishiyoku/Menu/MenuServiceProvider.html#method_register", "name": "Kaishiyoku\\Menu\\MenuServiceProvider::register", "doc": "&quot;Register the service provider.&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


