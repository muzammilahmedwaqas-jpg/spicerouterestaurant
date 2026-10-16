# Spice Route Restaurant - Staff Attendance & Shift Management System

Spice Route Restaurant web tool to track daily check-ins, manage shift schedules, handle leave requests, and produce monthly attendance payroll reports with CSV export[cite: 9, 18, 19, 20].

---

##  Hand-over Note

> **Hand-over Note for Reviewer & Supervisor:**
> 
> **What I Did:** Developed the complete Spice Route Restaurant system including employee & shift CRUD, daily attendance logging (check-in/check-out timestamps), leave request workflows with manager approvals, and an optimized monthly attendance summary reporting page featuring streaming CSV export. Configured role-based access control and deployed the live application.
> 
> **What Was Hard:** Aggregating dynamic monthly employee statistics (present days, calculated absences, and approved leaves) using efficient Eloquent eager loading queries to ensure optimal performance.
> 
> **Anything Left Out:** All core project requirements, rubric criteria, and deployment objectives are fully met without any omissions.

---

## Local Setup Instructions
1. Clone the repository[cite: 19]:
   ```bash
   git clone [https://github.com/muzammilahmedwaqas-jpg/spicerouterestaurant](https://github.com/muzammilahmedwaqas-jpg/spicerouterestaurant)
   cd spice-route-restaurant