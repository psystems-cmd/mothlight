
# MOTHLIGHT

### Idea and Main features
Mothlight is basically the forum that gets into existence when you cross Reddit with an anonymous forum and Co-Star. It is a place meant to track the dreams of individuals (mainly GenZ) and share it with friends, explore common dream patterns and understand if other people can relate. This is mostly targeted towards communities of friends. Every entry is private, with the option to share it. Usernames are pseudonomised, the owned "dream-collection" as well as the profile stays private. 

As per the scope - for the purpose of the course, there will not be friends, every user is either sharing publicly or is keeping it private. It would be interesting to add this as a self-referencing m:m, and deciding on friedns being mutual or not. 
The upvotes feature is postponed as well. ---

-------------- Edit below this line for the purpose of the evaluation prep for you @nico -------------------

## Final version (hand-in)

Everything above is the original plan from assignment 1. This section describes what was actually built, and where and why it differs.

### Logins (seeded)

| Email | Password | Role |
|---|---|---|
| admin@admin.com | password | admin -> will also be used to appear in seeded comments, not having own dreams. |
| mia@mothlight.test | Password3000 | admin, owns 5 dreams |


### Models and relations (as built)

- **User**: hasMany Dreams, hasMany Comments. `is_admin` marks admins.
- **Dream**: belongsTo User, belongsToMany Patterns, hasMany Comments. Fields: title, tldr, description, dreamt_at, woke_after, is_public.
- **Pattern**: belongsToMany Dreams.
- **Comment**: belongsTo User, belongsTo Dream.
- **dream_pattern**: pivot table between dreams and patterns.

Every model has a migration and a factory, and all of them are used in the DatabaseSeeder.

### Rules

Both live in the Dream model:

- `isVisibleTo($user)`: a dream is visible if it is public, or if the viewer is its owner or an admin. Otherwise 403.
- `canChange($user)`: only the owner or an admin may edit or delete a dream.

Pattern pages only list public dreams. Comments can only be posted on dreams you're allowed to see. Dreams can only be modified or deleted if you are allowed to change.

### Routes (as built)

Public:
- `home`: welcome page with login and sign-up
- `dreams.index`: all public dreams
- `dreams.show`: one dream, with its patterns and comments
- `patterns.index`, `patterns.show`: all patterns, and the public dreams per pattern
- login and register (from Laravel Breeze)

Logged in:
- `dashboard`: your own dreams. Admins see every dream, including private ones.
- Dream CRUD: `dreams.create`, `dreams.store`, `dreams.edit`, `dreams.update`, `dreams.destroy`. Together with index and show, that's all seven.
- `comments.store`: post a comment on a dream
- profile pages (from Laravel Breeze)

All input from forms is validated, and errors are shown next to the fields.

### Changes from the plan

- **Dreams can be edited after all.** The plan said "written once", but the course requires a full CRUD with all 7 methods. Dream was the most obvious to be used for all cruds.
- **No `my.` prefix.** The dream routes are the same for everyone; logging in unlocks more. The "my dreams" view became the dashboard.
- **No separate admin area.** Instead, one dashboard that shows admins every dream, and admins can edit or delete any dream through the same pages.

### AI Tooling
Claude was used throughout to coach and sparr, thus some parts of the code include structures, args, functions we may not have discussed in class. All code in main branch can be explained, in passages of reliance on generated code comments will indicate the use. Overall there is one commit that was a full "generated" committ. This was to spare my manual labor. In addition to that, the secondary branch is a vibecoded design version for better visuals. 


------------------------ORIGINAL READ ME below this line -------------------------------



### Models and Rleations

#### User-Dream = 1:M
- A User hasMany Dreams
- A Dream belongsTo a User
~~User-Profile = 1:1~~
~~- A User hasOne Profile~~
~~- A Profile belongsTo a User~~
#### Dream-Comment = 1:M
- A Dream hasMany Comments
- A Comment belongsTo a Dream
#### Dream-Pattern = M:M = dream.pattern
- A dream belongsToMany Patterns
- A Pattern belongsToMany Dreams
User-Comment = 1:M
- A user hasMany Comments
- A Comment belongsTo a User

Initial Draft: 

<img width="1326" height="994" alt="image" src="https://github.com/user-attachments/assets/cd3b42c1-ee49-4395-b870-eef666422b57" />

I crossed out what is out of scope, corrected what actually is a foreign key, and a few minor changes - before giving it to Claude for a review and illustration. 

<img width="773" height="364" alt="image" src="https://github.com/user-attachments/assets/8c3ad48f-0b9d-4e21-9181-e87265df8e2f" />



After sparring with Claude:
User-Profile: as profiles stay private, and the platform uses a pseudonym, there is no need for f_name and l_name which will be deleted from the drawing. 
Profiles: inthemselver have no use, as they dont have any data themselves. *dropped*
No need for Category AND pattern: category *dropped*
Patern was still in "dream" as a string, not a foreign key *changed*; with that it is logically a m:m which is resulting in a pivot table, no foreign keys in the individual tables.*include dream.pattern*
Also users need "is_admin" as there are 2 user types. 

### Routes
//Public
- Welcome -> Hello plus Login or Sign Up link
  
- dreams.index -> all publicly listed dreams
- dreams.show (id) -> detail page of one dream; private only dreams result in 403, unless viewer is owner
  
- patterns.index -> all patterns appearing on publicly listed dreams
- patterns.show (id) -> detail page of a pattern, with a list of public dreams tagged with it

- About page
- Contact page
- 404 Error page

- GET login
- POST login
- GET register
- POST register

// Logged In 

- my.dreams.index -> the users diary all the dreams posted themselves


// admin (user needs is_admin=true) -> thanks Claude for the remark ;)
- admin.dashboard


### CRUD-STUFF

//Dream CRUD -> no edit or update, like a diary entry they are written once or destroyed
- GET my.dreams.create -> return empty to create new dream (logged in from user diary view)
- POST my.dreams.store -> save input from above create form(logged in from user diary view)
- DELETE my.dreams.destroy (id) -> delete existing dream(logged in from user diary view)

// User Comment Section
- POST dreams.comments.store (dream_id) -> save a new comment to a dream
- DELETE comments.destroy (id) -> delete a comment (owner or admin for moderation)


//Dream Moderation
- GET admin.dreams.index
- DELETE admin.dreams.destroy (id) -> delete existing dream

//User Moderation
- GET admin.users.index
- DELETE admin.users.destroy (id) -> delete existing user

// Pattern CRUD
- GET admin.patterns.index
- GET admin.patterns.create -> return empty to create new pattern
- POST admin.patterns.store
- DELETE admin.patterns.destroy (id) -> delete existing pattern




