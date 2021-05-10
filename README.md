# viewstokens

This extension allows CiviCRM to make use of Drupal html content defined via the views module.

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP v7.2+
* CiviCRM 5.35+
* Drupal 8+

## Installation (Web UI)

Learn more about installing CiviCRM extensions in the [CiviCRM Sysadmin Guide](https://docs.civicrm.org/sysadmin/en/latest/customize/extensions/).

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl viewstokens@https://github.com/blackflysolutions/viewstokens/archive/master.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/blackflysolutions/viewstokens.git
cv en viewstokens
```

## Getting Started

All Drupal views will be included in the token list. You can make use of an existing view, or (usually)
create a view specifically to be included as a token. The token format is 

{views.view_name__display_name}

The token will show up with the view name followed by the display label. 

## Known Issues

There are a few challenges which make this extension not useable yet.

1. Themeing

The Drupal theme layer participates in the generating of views html.

For the most part, we don't want that - we want to be specific about which views templates get used.

Especially for mosaico content, for which we'd like to replicate the responsive email html.

Working on that now.

2. Mosaico templates

To generate a list of content, we need a 'placeholder' kind of element in mosaico so it doesn't wrap it up in redundant html.

I've got the beginning of that in this extension, but it needs some work.

