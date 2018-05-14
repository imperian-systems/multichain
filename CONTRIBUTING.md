# Monarch Repositories

## Languages
* PHP
* HTML/CSS
* JavaScript (ECMA 6+)


## Frameworks / Libraries
* Laravel (https://github.com/laravel/laravel)
* Axios (https://github.com/mzabriskie/axios)
* React (https://facebook.github.io/react/docs/installation.html)
* React Router DOM (https://github.com/ReactTraining/react-router/tree/master/packages/react-router-dom)
* Redux (https://github.com/reactjs/redux/blob/master/README.md)

## VCS
* Git
    * Using GitHub (https://github.com/imperiansystems)
* Composer
    * via `composer.json`
* NPM
    * via `package.json`

## Tools
* GitKraken (optional)
    * Enable GitFlow 
* Visual Studio Code (optional but unless you wanna pay for intellij it's the best)
    - Preferred extensions
        + ESLint (can be a bitch to configure)
    - Recommended extensions
        + Beautify
        + Bracket Pair Colorizer
        + Git Lens
        + HTML CSS Support
        + HTML Snippets
        + IntellSense for CSS class names
        + JSON Tools
        + npm
        + npm Intellisense
        + Project Manager (Depending on whether this thing becomes a monolith or microservices)
        + React Standard Style code snippets

## Branching strategy and Git tips
### Using CLI
#### Initial setup 

Get ssh key setup and put your public key on your github profile
    
Get git if you don't already have it and set up your initial username and email
```
$ git config --global user.name "John Doe"
$ git config --global user.email johndoe@example.com
```
Clone repo to your local machine dev directory
    
After intial setup you will have the latest version of master checked out locally
#### Recurring (This stuff happens every time you work a story)
1. Pull latest version of master

   Make sure `master` is checked out
    ```
    $ git status
    ```
    If not, check it out
    ```
    $ git checkout master
    ```
    Pull the latest code from `master`
    ```
    $ git pull
    ```
2. Make a feature branch for your task **It should align to a story** 

    The `-b` switch will create the branch if it isn't already there, and the name must begin with the Jira story ID and a description. No spaces, no special characters.
    ```
    $ git checkout -b MON-123-Brief-Description-of-Story
    ```
3. At this point you can push your remote branch to origin. You will add commits to this local branch and push it as often as you want. It's your safe place to store your code. 

    Upon the initial push, it will set up an upstream for your feature branch `origin/MON-123-Brief-Description-of-Story`
    ```
    $ git push -u origin MON-123-Brief-Description-of-Story
    ```
    
    * Commit early, commit often, make commits atomic, make commit messages descriptive. You will thank yourself later when you have to revert or cherry-pick.

    * Do some work, make some changes, whatever... When you feel that you've hit a good point to "save" your progress in an increment, commit it to your local branch.

    * First you stage your changes:
        ```
        $ git add -A
        ```
    * Then you make your commit:
        ```
        $ git commit -m '[MON-123] Brief Description
        > -not closing your quotes lets you make multi-line
        > -more descriptive commit messages... but your 
        > -first line should be short like 
        > -"Brief Description" above. Closing the single 
        > -quote will end the message'
        ```
    * You can make multiple commits and do and "end of work session" push or push after every commit. I know guys who do both. It's completely up to you. Your remote branch is yours. Whatever your style, you've already set your origin so just: 
        ```
        $ git push
        ```
4. Once you're satisfied that you've finished with the story you're working and that you have met the acceptance criteria, you're ready to make a pull request. Unfortunately, your branch might be out of sync with master. You might even need to resolve conflicts.

    * Checkout `master` and pull again to get latest changes
        ```
        $ git checkout master && git pull
        ```
    * Switch back to your branch and merge `master` into it.
        ```
        $ git checkout MON-123-Brief-Description-of-Story
        $ git merge master
        ```
    * If you're lucky there won't be any conflicts. If there are, there are great conflict resolution tools. GitKraken has a good one, and VS Code's isn't too bad either. We will discuss and come up with a good process for this going forward. 

5. Make your PR

    * Once your branch is conflict free GitHub will indicate that can be "automatically merged". This just means there aren't any conflicts. You will create a pull request to merge your feature branch into master.

    * Let everyone know in the Slack dev channel that you've got a PR up. The code will be reviewed, and the reviewer will make notes, change requests, and ultimately approve it. 

    * Once it's approved you can go to your Pull Request and click "Merge". 

    * Delete your remote branch right after you merge it to keep the branches clean. there will be a delete button right where the merge button was once you merge.

6. Tidy up your local environment

    * Now your branch is defunct and your changes are part of master. There is no reason to have a local feature branch any more. 

    * Check out `master` because you can't delete a checked out branch

    * Pull `master` and feel the satisfaction of your code coming through the main line

    * Delete your local feature branch
        ```
        $ git branch -d MON-123-Brief-Description-of-Story
        ```
7. Mark your story as complete (if it is) and move on to the next... rinse and repeat.
        