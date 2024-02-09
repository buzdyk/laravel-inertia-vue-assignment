# Ninacare test assignment

![Filtering](./readme.png)

Notes: 

0. Screen recording is added as a gif to this README file. Its location is `./readme.gif`.
1. Implemented basic responsive layout for the bookings.
2. Implemented a client-side search. Bookings list component is reusable as is. Filter-able bookings list can be easily extracted to a reusable component from Welcome.vue.
3. I picked the client-side route to follow the re-usability requirement. Other than that the search is surely implementable using Inertia. I would do it via a submit button click though to avoid behavior like the search input losing focus on page re-render.
4. Booking statuses account only for the positive flow. I imagine there would be other statuses in real-world scenarios.
5. It's assumed a user can have only one role.

Thank you,
Gregory.
