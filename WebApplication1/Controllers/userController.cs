using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Threading.Tasks;

using Microsoft.AspNetCore.Mvc;

using MySql.Data.MySqlClient;

using dto = WebApplication1.Models;

namespace WebApplication1.Controllers
{

    public class TasksController : Controller
    {
        private MySqlDatabase MySqlDatabase { get; set; }
        public TasksController(MySqlDatabase mySqlDatabase)
        {
            this.MySqlDatabase = mySqlDatabase;
        }
        private async Task<List<dto.user>> GetUsers()
        {
            var ret = new List<dto.user>();

            var cmd = this.MySqlDatabase.Connection.CreateCommand() as MySqlCommand;
            cmd.CommandText = @"SELECT userId, userName, userPsw FROM tbluser";


            using (var reader = await cmd.ExecuteReaderAsync())
                while (await reader.ReadAsync())
                {
                    var t = new dto.user()
                    {
                        userId = reader.GetFieldValue<int>(0),
                        userName = reader.GetFieldValue<string>(1),
                        userPsw = reader.GetFieldValue<string>(2)
                    };



                    ret.Add(t);
                }
            return ret;
        }

    }  
}

