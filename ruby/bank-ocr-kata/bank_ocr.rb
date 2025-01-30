class Account
  def initialize()
  end

  def to_s
    "000000000"
  end
end


class Accounts
  # include Enumerable

  attr_reader :accounts
  def initialize(numbers_cases)
    @accounts = [Account.new()]
  end

  def [](index)
    accounts[index].to_s
  end

end