# VirtualGameAPI - NOT READY FOR USAGE YET
A fast, secure, and innovative processing based API to use for game handling on multiple servers. Licensed under MIT.

Like using it? Support VirtualGalaxy by donating a bit to allow us to bring more innovative stuff for you! Your donations are used on maintaining our continuing projects and the creating future ones.

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=G34YTKEPC6R3U)

Support? Email us! - support@vgpe.me

## ISSUES

Had an issue using the API? Think it should provide something more than it does now? Let us know! **PLEASE NOTE: ISSUES AREN'T SUPPORT. THAT IS PROVIDED via EMAIL.**

Using the github issue panel, please submit an issue/suggestion regarding your point. Explain in as much detail as possible. 

If you had an error code popup as well, please make the error code your title. In the description of the issue, explain how it occured and any other output in the console. Furthermore, if you think you have fixed the issue yourself - be nice enough to submit a PR (pull request - [Contribution Guidelines](https://github.com/VGDevelopment/VirtualGameAPI#contribution)) so it's fixed for everyone! We're all in this together!

If you just received some console output which you don't have an idea about, have your title be the very 1st sentence of the output (without the directory names).

For suggestions, consider setting the title as a 1-5 word summary of the suggestion and explain it in as much possible detail in the description.

The following people are managing issues:

- [@TheRoyalBlock](https://github.com/TheRoyalBlock) - AvgZing (Community Collaborator)

## DOCUMENTATION

While our effort to make this API as easy to use has been going on, there are still some cases where stuff gets complicated. Sadly, we can't do anything about that other than try to assist you in the best possible manner!

- Directory Listing :

```yaml
VirtualGameAPI:
    API
    game:
        GameManager
        GamePointer
    network:
        Database
        GameServer
    util:
        Converter
        ErrorHandler
```

- Pre-required Stuff :
    
    Here is some stuff you need to have before this API will work properly. **NOTE : Some of these pre-required stuff have their own pre-required needs. Yes, what a drag!**
    
    - More than one working PMMP installation connected with the public internet. We support the 3.0.0-ALPHA11 API as of now. [Recommended is multiple servers]
        - PMMP : https://github.com/pmmp/PocketMine-MP
    - A working MySQL DB installed on either your private/public machine which is connected with the public internet.
        - https://www.mysql.com/
        - You can contact us via **support@vgpe.me** to get a database for $0.99/month! Create as many tables as you want, store as much data as to 5GB! We manage the technical stuff and even provide some extra support regarding MySQL (free of charge)!
        Accepted payment methods :
            - Paypal
            - Credit/Debit Card (processed by Paypal)

- Installation :
    
    Installing the VirtualGameAPI is simplistic. Here are the shipped packages. You can also `git clone` it, however, we don't recommend that unless you know what you're doing.
    
    - SAFE : 
    - LATEST :

    Download and add directly into your **src** folder.

- Configuration : (please read Directory Listing before doing this)
    
    So you got through the tough part of this system, 'installation'! However, there is still some stuff left (you will need to do most stuff manually as there isn't a custom installer... yet).
    
    First we need to set the database connection. Go to the **Database.php** object and either add the class to import from or input database details.

- Usage : (please read Directory Listing before doing this)

    Here are some things you need to do. In your plugins, please use the **API.php** object in the main class. Then in the **"onEnable()"** method (also abbreviated as function), add the following code.
    ```php
    API::start($this);
    ```
    Good job!

    Next thing we need to do is create our first game! Make sure you are using the **GameManager.php** object. Over there, you need to run the method like so : 
    ```php
    $time = [
        "ps" => 5, // time b4 game
        "gt" => 10, // time of game
        "type" => "M" // in minutes
    ];

    GameManager::makeGame(GameManager::GAME_CONST, 15, $time, "MyWorld", 8);
    ```
    Now that we've created our first game. Let's set up the appropriate servers for it so when we run it, we know which server it should teleport the players to. Currently VirtualGameAPI officially supports a list of multiple games, with their own game constants.
    You can view this list in the following interface, **GamePointer.php**.

    Anyhow, make your way to the **GamePointer.php** interface. Inside you'll find a constant "GAME_TO_SERVER". In the constant, please add your servers in the following format.
    ```php
    const GAME_TO_SERVER = [
        self::GAME_CONST => [
            "game.yourdomain.com|yourport",
            "game.yourdomain.com|19132"
        ]
    ];
    ```
    It is the absolute necessity that you use the same format. Any issues created for not following the given format will be closed instantly at VG's discretion.

## CONTRIBUTION

As this is a open-source platform (API) designed for you guys by VirtualGalaxy, we cannot cover all of your needs.

On such note, we have allowed "pull requests". You can create a pull request by forking this repository, editing in your changes and then creating the request. If your changes are deemed appropriate by one of the monitoring developers, we will merge it in. If not, we will deny the request.

Acceptance of pull request is entirely up to us.

This software is a community software and licensed by us. Any code you write for this software, once merged is no longer your property. You may credit yourself seperately in the file, however, it is Virtual Galaxy Property. Credits must follow this format.
```php
/*
This was coded by <YOUR NAME> under the VGDevelopment Organisation.
By the MIT License, you can do whatever you want with this file with no restrictions unless implied in the License.
You cannot however remove this commented in citation of the authorship of the file. You must add this to any file using code from this file.
*/
```

### LICENSE
    
This software is licensed under the official MIT License. It allows you to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of this API (software) as long as you mention or state that the software is available at this repository for free and give credit to appropriate authors. 

Here's the complete license.

```
MIT License

Copyright (c) 2018 Virtual Galaxy

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

**NOTE : VirtualGameAPI is not affiliated with PocketMine-MP (PMMP or any other abbreviation), Poggit, or Mojang AB (Microsoft or any other related entity).**