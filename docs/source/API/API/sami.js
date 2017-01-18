
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">Strime</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Strime_Slackify" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Strime/Slackify.html">Slackify</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Strime_Slackify_Exception" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Strime/Slackify/Exception.html">Exception</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Strime_Slackify_Exception_ExceptionInterface" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Strime/Slackify/Exception/ExceptionInterface.html">ExceptionInterface</a>                    </div>                </li>                            <li data-name="class:Strime_Slackify_Exception_ExecutableNotFoundException" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Strime/Slackify/Exception/ExecutableNotFoundException.html">ExecutableNotFoundException</a>                    </div>                </li>                            <li data-name="class:Strime_Slackify_Exception_InvalidArgumentException" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Strime/Slackify/Exception/InvalidArgumentException.html">InvalidArgumentException</a>                    </div>                </li>                            <li data-name="class:Strime_Slackify_Exception_LogicException" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Strime/Slackify/Exception/LogicException.html">LogicException</a>                    </div>                </li>                            <li data-name="class:Strime_Slackify_Exception_RuntimeException" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Strime/Slackify/Exception/RuntimeException.html">RuntimeException</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Strime_Slackify_Webhooks" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Strime/Slackify/Webhooks.html">Webhooks</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Strime_Slackify_Webhooks_AbstractWebhook" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Strime/Slackify/Webhooks/AbstractWebhook.html">AbstractWebhook</a>                    </div>                </li>                            <li data-name="class:Strime_Slackify_Webhooks_Webhook" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Strime/Slackify/Webhooks/Webhook.html">Webhook</a>                    </div>                </li>                            <li data-name="class:Strime_Slackify_Webhooks_WebhooksInterface" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Strime/Slackify/Webhooks/WebhooksInterface.html">WebhooksInterface</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Strime_Slackify_Slackify" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Strime/Slackify/Slackify.html">Slackify</a>                    </div>                </li>                            <li data-name="class:Strime_Slackify_SlackifyServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Strime/Slackify/SlackifyServiceProvider.html">SlackifyServiceProvider</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "Strime.html", "name": "Strime", "doc": "Namespace Strime"},{"type": "Namespace", "link": "Strime/Slackify.html", "name": "Strime\\Slackify", "doc": "Namespace Strime\\Slackify"},{"type": "Namespace", "link": "Strime/Slackify/Exception.html", "name": "Strime\\Slackify\\Exception", "doc": "Namespace Strime\\Slackify\\Exception"},{"type": "Namespace", "link": "Strime/Slackify/Webhooks.html", "name": "Strime\\Slackify\\Webhooks", "doc": "Namespace Strime\\Slackify\\Webhooks"},
            {"type": "Interface", "fromName": "Strime\\Slackify\\Exception", "fromLink": "Strime/Slackify/Exception.html", "link": "Strime/Slackify/Exception/ExceptionInterface.html", "name": "Strime\\Slackify\\Exception\\ExceptionInterface", "doc": "&quot;&quot;"},
                    
            {"type": "Interface", "fromName": "Strime\\Slackify\\Webhooks", "fromLink": "Strime/Slackify/Webhooks.html", "link": "Strime/Slackify/Webhooks/WebhooksInterface.html", "name": "Strime\\Slackify\\Webhooks\\WebhooksInterface", "doc": "&quot;&quot;"},
                    
            
            {"type": "Class", "fromName": "Strime\\Slackify\\Exception", "fromLink": "Strime/Slackify/Exception.html", "link": "Strime/Slackify/Exception/ExceptionInterface.html", "name": "Strime\\Slackify\\Exception\\ExceptionInterface", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "Strime\\Slackify\\Exception", "fromLink": "Strime/Slackify/Exception.html", "link": "Strime/Slackify/Exception/ExecutableNotFoundException.html", "name": "Strime\\Slackify\\Exception\\ExecutableNotFoundException", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "Strime\\Slackify\\Exception", "fromLink": "Strime/Slackify/Exception.html", "link": "Strime/Slackify/Exception/InvalidArgumentException.html", "name": "Strime\\Slackify\\Exception\\InvalidArgumentException", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "Strime\\Slackify\\Exception", "fromLink": "Strime/Slackify/Exception.html", "link": "Strime/Slackify/Exception/LogicException.html", "name": "Strime\\Slackify\\Exception\\LogicException", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "Strime\\Slackify\\Exception", "fromLink": "Strime/Slackify/Exception.html", "link": "Strime/Slackify/Exception/RuntimeException.html", "name": "Strime\\Slackify\\Exception\\RuntimeException", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "Strime\\Slackify", "fromLink": "Strime/Slackify.html", "link": "Strime/Slackify/Slackify.html", "name": "Strime\\Slackify\\Slackify", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Strime\\Slackify\\Slackify", "fromLink": "Strime/Slackify/Slackify.html", "link": "Strime/Slackify/Slackify.html#method___construct", "name": "Strime\\Slackify\\Slackify::__construct", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Strime\\Slackify", "fromLink": "Strime/Slackify.html", "link": "Strime/Slackify/SlackifyServiceProvider.html", "name": "Strime\\Slackify\\SlackifyServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Strime\\Slackify\\SlackifyServiceProvider", "fromLink": "Strime/Slackify/SlackifyServiceProvider.html", "link": "Strime/Slackify/SlackifyServiceProvider.html#method_register", "name": "Strime\\Slackify\\SlackifyServiceProvider::register", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Strime\\Slackify\\SlackifyServiceProvider", "fromLink": "Strime/Slackify/SlackifyServiceProvider.html", "link": "Strime/Slackify/SlackifyServiceProvider.html#method_boot", "name": "Strime\\Slackify\\SlackifyServiceProvider::boot", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Strime\\Slackify\\Webhooks", "fromLink": "Strime/Slackify/Webhooks.html", "link": "Strime/Slackify/Webhooks/AbstractWebhook.html", "name": "Strime\\Slackify\\Webhooks\\AbstractWebhook", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "Strime\\Slackify\\Webhooks", "fromLink": "Strime/Slackify/Webhooks.html", "link": "Strime/Slackify/Webhooks/Webhook.html", "name": "Strime\\Slackify\\Webhooks\\Webhook", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Strime\\Slackify\\Webhooks\\Webhook", "fromLink": "Strime/Slackify/Webhooks/Webhook.html", "link": "Strime/Slackify/Webhooks/Webhook.html#method___construct", "name": "Strime\\Slackify\\Webhooks\\Webhook::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Strime\\Slackify\\Webhooks\\Webhook", "fromLink": "Strime/Slackify/Webhooks/Webhook.html", "link": "Strime/Slackify/Webhooks/Webhook.html#method_getUrl", "name": "Strime\\Slackify\\Webhooks\\Webhook::getUrl", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Strime\\Slackify\\Webhooks\\Webhook", "fromLink": "Strime/Slackify/Webhooks/Webhook.html", "link": "Strime/Slackify/Webhooks/Webhook.html#method_setUrl", "name": "Strime\\Slackify\\Webhooks\\Webhook::setUrl", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Strime\\Slackify\\Webhooks\\Webhook", "fromLink": "Strime/Slackify/Webhooks/Webhook.html", "link": "Strime/Slackify/Webhooks/Webhook.html#method_sendMessage", "name": "Strime\\Slackify\\Webhooks\\Webhook::sendMessage", "doc": "&quot;{@inheritdoc}&quot;"},
                    {"type": "Method", "fromName": "Strime\\Slackify\\Webhooks\\Webhook", "fromLink": "Strime/Slackify/Webhooks/Webhook.html", "link": "Strime/Slackify/Webhooks/Webhook.html#method_setAttachments", "name": "Strime\\Slackify\\Webhooks\\Webhook::setAttachments", "doc": "&quot;{@inheritdoc}&quot;"},
            
            {"type": "Class", "fromName": "Strime\\Slackify\\Webhooks", "fromLink": "Strime/Slackify/Webhooks.html", "link": "Strime/Slackify/Webhooks/WebhooksInterface.html", "name": "Strime\\Slackify\\Webhooks\\WebhooksInterface", "doc": "&quot;&quot;"},
                    
            
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


