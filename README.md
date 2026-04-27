# Foodies

A restaurant review web application where users document dining experiences through ratings, pricing, images, and long-form reviews.

## Project Context

This project was developed as part of a university assignment to build a full-stack application with user-generated content and relational data modelling. It explores how structured inputs (ratings, pricing, restaurant entities) can be combined with free-form reviews and media within a cohesive system.

## Technical Approach

The application is built around a relational model linking users, restaurants, and reviews, where each review combines structured attributes (rating, price) with narrative content and optional media.

Server-rendered Blade templates handle core page delivery, while Vue.js components introduce interactivity for features such as likes and comments. These interactions are backed by a lightweight API layer enabling asynchronous updates without full page reloads.

Access control and content ownership are enforced through conditional logic at the view layer, governing edit, delete, and interaction capabilities for users and administrators.

The system prioritises server-side rendering while selectively introducing client-side behaviour where it improves user interaction.

## Outcomes

- Implemented a complete review lifecycle encompassing creation, editing, and deletion enabling users to maintain accurate and up-to-date representations of their dining experiences over time.
- Modelled relational links between users, restaurants, and reviews supporting consistent aggregation of restaurant-level insights such as review counts and average ratings.
- Introduced asynchronous interactions for likes and comments reducing page reload dependency and improving responsiveness for frequent user actions such as engagement and feedback.
- Enforced ownership- and role-based access control ensuring content modification and deletion are restricted to authorised users.
- Supported mixed content inputs including structured ratings, pricing, and unstructured text with media enabling richer and more expressive review submissions compared to purely numeric rating systems.
- Implemented email notifications triggered by user interactions such as likes and comments extending engagement beyond the application interface.

## Technology Stack

**Backend:** Laravel 9 (PHP 8.0+)

**Frontend:** Blade Templating Engine, Vue.js + Axios for client-side interactivity

**Database:** MySQL

**ORM:** Eloquent
