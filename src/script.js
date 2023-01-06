if (document.readyState === 'loading')
{
    document.addEventListener('DOMContentLoaded', init)
}
else
{
    init()
}

function init()
{
    const data =
        {
        name: 'Каталог товаров',
        hasChildren: true,
        items: [
            {
                name: 'Мойки',
                hasChildren: true,
                items: [
                    {
                        name: 'Ulgran',
                        hasChildren: true,
                        items: [
                            {
                                name: 'Smth',
                                hasChildren: false,
                                items: []
                            },
                            {
                                name: 'Smth',
                                hasChildren: false,
                                items: []
                            }
                        ]
                    },
                    {
                        name: 'Vigro Mramor',
                        hasChildren: false,
                        items: []
                    },
                    {
                        name: 'Handmade',
                        hasChildren: true,
                        items: [
                            {
                                name: 'Smth',
                                hasChildren: false,
                                items: []
                            },
                            {
                                name: 'Smth',
                                hasChildren: false,
                                items: []
                            }
                        ]
                    },
                    {
                        name: 'Vigro Glass',
                        hasChildren: false,
                        items: []
                    },
                ]
            },{
                name: 'Фильтры',
                hasChildren: true,
                items: [
                    {
                        name: 'Ulgran',
                        hasChildren: true,
                        items: [
                            {
                                name: 'Smth',
                                hasChildren: false,
                                items: []
                            },
                            {
                                name: 'Smth',
                                hasChildren: false,
                                items: []
                            }
                        ]
                    },
                    {
                        name: 'Vigro Mramor',
                        hasChildren: false,
                        items: []
                    }
                ]
            }
        ]
    }


    const items = new ListItems(document.getElementById('list-items'), data)

    items.render()
    items.init()

    function ListItems(el, data)
    {
        this.el = el;
        this.data = data;

        this.init = function ()
        {
            const parents = this.el.querySelectorAll('[data-parent]')

            parents.forEach(parent => {
                const open = parent.querySelector('[data-open]')

                open.addEventListener('click', () => this.toggleItems(parent) )
            })
        }

        this.render = function ()
        {
            this.el.insertAdjacentHTML('beforeend', this.renderParent(this.data))
        }

        this.renderParent = function (data)
        {
            let folder = ''

            folder += '<div class="list-item list-item_open" data-parent>'
            folder += this.getFolderHtml(data)
            folder += '<div class="list-item__items">'
            for (let item of data.items)
            {
                if (!item.hasChildren)
                {
                    folder += this.renderChildren(item)
                }
                else
                {
                    folder += this.renderParent(item)
                }
            }
            folder += '</div>'
            folder += '</div>'

            return folder
        }

        this.renderChildren = function (element)
        {
            let folder = ''

            folder += '<div class="list-item__inner">'
            folder += '<div class="list-item__gap">'
            folder += '</div>'
            folder += '<img class="list-item__folder" src="assets/img/folder.png" alt="folder">'
            folder += `<span>${element.name}</span>`
            folder += '</div>'

            return folder
        }

        this.toggleItems = function (parent)
        {
            parent.classList.toggle('list-item_open')
        }

        this.getFolderHtml = function (element)
        {
            let folderHtml = ''
            folderHtml += '<div class="list-item__inner">'
            folderHtml += '<img class="list-item__arrow" src="assets/img/chevron-down.png" alt="chevron-down" data-open>'
            folderHtml += '<img class="list-item__folder" src="assets/img/folder.png" alt="folder">'
            folderHtml += `<span>${element.name}</span>`
            folderHtml += '</div>'
            return folderHtml
        }
    }
}