$sqlview="SELECT a.Id,a.Login_id, a.Name, a.Email, a.Phno,a.Address, a.Bloodgroup,a.Age, a.Gender,a.FileURL,b.Name
  FROM volunteerprofile as a left join Bloodgroup as b on a.Name;