<img src="https://github.com/madebyshape/login-count/raw/master/screenshots/icon.png" width="50">

# Login Count

Login Count is a Craft CMS plugin that allows you to track how many times your users have logged in. 

It is useful to show specific messages to users or promotions after X amount of logins.

## Install

- Add the `logincount` directory into your `craft/plugins` directory.
- Navigate to `Settings -> Plugins` and click the "Install" button.

## Features

- Set a 'delay' between each time a user logs in (Default: 3 hours)
- Access 'totals' and 'absolute totals' regardless of the delay
- Option to ignore login counts if the user logs in via the control panel
 
## Templating

There are two available methods:

- `.total()` Outputs the total login count (Taking in to account the login time delay)

```HTML
{{ craft.logincount.total(currentUser) }}
```

- `.totalAbsolute()` Outputs the total login count

```HTML
{{ craft.logincount.totalAbsolute(currentUser) }}
```

Both methods need to have a user object passed to it, such as `currentUser`

## Roadmap

- Extend the User view to show counts in the table view

## Credits

Password by Adnen Kadri from the Noun Project (https://thenounproject.com/adnen.kadri/)