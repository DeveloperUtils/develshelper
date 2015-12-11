/**
 * Created by christoph on 12/8/15.
 */

TagTag = {
    $collectionHolder: null,
    // setup an "add a tag" link

    addTagForm: function ($collectionHolder, $newLinkLi) {
        // Get the data-prototype explained earlier
        var prototype = $collectionHolder.data('prototype');

        // get the new index
        var index = $collectionHolder.data('index');

        // Replace '__name__' in the prototype's HTML to
        // instead be a number based on how many items we have
        var newForm = prototype.replace(/__name__/g, index);

        // increase the index with one for the next item
        $collectionHolder.data('index', index + 1);

        // Display the form in the page in an li, before the "Add a tag" link li
        var $newFormLi = $('<li></li>').append(newForm);
        $newLinkLi.before($newFormLi);

        // add a delete link to the new form
        this.addTagFormDeleteLink($newFormLi);
    },
    addTagFormDeleteLink: function ($tagFormLi) {
        var $removeFormA = $('<a href="#">delete this tag</a>');
        $tagFormLi.append($removeFormA);

        $removeFormA.on('click', function (e) {
            // prevent the link from creating a "#" on the URL
            e.preventDefault();

            // remove the li for the tag form
            $tagFormLi.remove();
        });
    },

    addToJQuery: function () {

        var me = this;

        var $addTagLink = $('<a href="#" class="add_tag_link">Add a tag</a>');
        var $newLinkLi = $('<li></li>').append($addTagLink);

        // Get the ul that holds the collection of tags
        this.$collectionHolder = $('ul.tags');

        // add a delete link to all of the existing tag form li elements
        this.$collectionHolder.find('li').each(function () {
            me.addTagFormDeleteLink($(this));
        });

        // add the "add a tag" anchor and li to the tags ul
        this.$collectionHolder.append($newLinkLi);

        // count the current form inputs we have (e.g. 2), use that as the new
        // index when inserting a new item (e.g. 2)
        this.$collectionHolder.data('index', this.$collectionHolder.find(':input').length);

        $addTagLink.on('click', function (e) {
            // prevent the link from creating a "#" on the URL
            e.preventDefault();

            // add a new tag form (see next code block)
            me.addTagForm(me.$collectionHolder, $newLinkLi);
        });
    }
};