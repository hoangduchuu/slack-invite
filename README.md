 # Slack invite api
 demo : http://quangbinhxanh.com/slack

## Send a request to slack api (as admin). The api will be return json like this:
        {
          "ok": false,
          "error": "already_invited"
        }

## Arguments
This method has the URL `https://slack.com/api/users.admin.invite` and follows the [Slack Web API calling conventions](https://api.slack.com/web#basics).

Argument|Example|Required|Description
--------|-------|--------|-----------
token|xxxx-xxxxxxxxx-xxxx|Required|Authentication token (Requires scope: `'client'`)
email|john.doe@email.com|Required|Email address of the new user
channels|C1234567890,G12345678|Optional|Comma-separated list of IDs (not names!) for channels, which the new user will auto-join. Both channel IDs for public channels and group IDs for private chanels work. 
first_name|John|Optional|Prefilled input for the "First name" field on the "new user registration" page.
last_name|Doe|Optional|Prefilled input for the "Last name" field on the "new user registration" page.
resend|true|Optional|Resend the invitation email if the user has already been invited and the email was sent some time ago.
restricted|true|Optional|Invite a guest that can use multiple channels
ultra_restricted|true|Optional|Invite a guest that can use one channel only
### Response
#### * looking at Json return , we have
  ```json
  {
  "ok": true
  "error": "already_invited"
  }
  ```
#### * explain   
  * `ok` : this will be return true or false
    when ok, slack will send an email, if false, read line bellow
  * `error`: if ok == false, error will be return error code 
## Errors & Warnings
Error|Description
--------|-------
`already_invited`|User has already received an email invitation
`already_in_team`|User is already part of the team
`channel_not_found`|Provided channel ID does not match a real channel
`sent_recently`|When using resend=true, the email has been sent recently already
`user_disabled`|User account has been deactivated
`missing_scope`|Using an access_token not authorized for `'client'` scope
`invalid_email`|Invalid email address (e.g. "qwe"). Note that Slack does not recognize some email addresses even though they are technically valid. This is a known issue.
`not_allowed`|When SSO is enabeld this method can not be used to invite new users except guests. The [SCIM API](https://api.slack.com/scim) needs to be used instead to invite new users. For inviting guests the `restricted` or `ultra_restricted` property needs to be provided
tbd
