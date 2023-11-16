## Samplpe Code
Please download the sample code for CI/CD and API.

## How does it work
CI/CD - Please use ci-cd directory in repository

If a project wants to test using a branch/MR of this repo, go to your project's CI/CD settings page and add the variables below. All pipelines in the project will use the specified repo+branch until the variables are removed. Variables should be: not masked, not scoped, not restricted to protected branches, expanded=yes.
  - `_GITLAB_TEMPLATES_REF=[BRANCH-NAME]`
  - `_GITLAB_TEMPLATES_REPO=[ORG/REPO-NAME]` (e.g. `project/gitlab_templates` or `issue/gitlab_templates-nnnnnnn` for an issue fork)

-------------------------------------------------------------------------

API   - Please use api directory in repository
You can use the API from a web front-end application, mobile app and also using the app called Postman in Chrome

We have 4 methods of access the API:
1. GET
2. POST
3. PUT
4. DELETE